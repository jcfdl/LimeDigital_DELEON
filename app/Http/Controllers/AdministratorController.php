<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Media;
use App\Category;
use App\Article;
use App\User;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
	public function index(Request $request) {
		$view_count = Article::selectRaw('SUM(views) AS count')
										->first();
		$active_count = Article::selectRaw('COUNT(id) AS count')
										->first();

		$article_count = Article::withTrashed()->selectRaw('COUNT(id) AS count')
										->first();
		$category_count = Category::withTrashed()->selectRaw('COUNT(id) AS count')
										->first();
		$media_count = Media::selectRaw('COUNT(id) AS count')
										->first();
		$user_count = User::selectRaw('COUNT(id) AS count')
										->first();	
		$articles = Article::
									orderBy('id', 'DESC')->paginate(10);
		$articles->withPath('/administrator/all');	
		if($request->page) {
    	return view('admin.load_articles', compact('articles'));
    }						
		return view('admin.index', compact('view_count', 'active_count', 'article_count', 'category_count', 'media_count', 'user_count', 'articles'));
	}

	public function all(Request $request) {
		session($request->except('page'));
		$search = session('all_search');
		$status = session('all_status');
		$articles = Article::
									when($status, function($query) use ($status) {
										if($status == 'trashed') {
											return $query->onlyTrashed();
										} 
									})
									->when($search, function($query) use ($search) {
										return $query->where('title', 'LIKE', '%'.$search.'%');
									})									
									->orderBy('id', 'DESC')
									->paginate(10);
		$articles->withPath('/administrator/all');
		if($request->page || $request->all_status || $request->all_search || $request->clear) {
    	return view('admin.load_articles', compact('articles'));
    }
		return view('admin.all', compact('articles'));
	}

	public function media(Request $request) {	
		session($request->except('page'));			
		$search = session('media_search');
		$medias = Media::
									when($search, function($query) use ($search) {
										return $query->where('name', 'LIKE', '%'.$search.'%');
									})
									->orderBy('id', 'DESC')
									->paginate(20);
		$medias->withPath('/administrator/media');
		if($request->page || $request->media_search || $request->clear) {
    	return view('admin.load_media', compact('medias'));
    }
		return view('admin.media', compact('medias'));
	}

	public function category(Request $request) {
		session($request->except('page'));
		$search = session('category_search');
		$status = session('category_status');
		$categories = Category::
									when($status, function($query) use ($status) {
										if($status == 'trashed') {
											return $query->onlyTrashed();
										} 
									})
									->when($search, function($query) use ($search) {
										return $query->where('name', 'LIKE', '%'.$search.'%');
									})
									->orderBy('id', 'DESC')
									->paginate(10);
		$categories->withPath('/administrator/category');
		if($request->page || $request->category_status || $request->category_search || $request->clear) {
    	return view('admin.load_categories', compact('categories'));
    }
		return view('admin.category', compact('categories'));
	}

	public function deleteCategory(Request $request) {
		$category = Category::findOrFail($request->id);
		$article = Article::where('category_id', $category->id)->first();
		if($article) {
			$category->status = 1;
			$category->update();
			$request->session()->flash('category_fail', 'Cannot delete category! Delete the articles first!');
			return $this->category(new Request());
		}
		$category->status = 0;
		$category->delete();
		$request->session()->flash('category_trashed', 'The category was moved to trash!');
		return $this->category(new Request());
	}	

	public function restoreCategory(Request $request) {
		$category = Category::withTrashed()->findOrFail($request->id);		
		$category->restore();
		$category->status = 1;
		$category->update();
		$request->session()->flash('category_restored', 'The category was restored!');
		return $this->category(new Request());
	}

	public function permaDeleteCategory(Request $request) {
		$category = Category::withTrashed()->findOrFail($request->id);
		$category->forceDelete();
		$request->session()->flash('category_delete', 'The category was permanently deleted!');
		return $this->category(new Request());
	}

	public function newCategory() {
		return view('admin.new_category');
	}

	public function new(Request $request) {
		$categories = Category::pluck('name', 'id')->all();
		$medias = Media::all();
		return view('admin.new', compact('categories', 'medias'));
	}

	public function show(Request $request) {
		$article = Article::findOrfail($request->id);
		return view('admin.show', compact('article'));
	}

	public function loadMedia(Request $request) {
		$medias = Media::orderBy('id', 'DESC')->get();
		return view('admin.load_tinymce_media', compact('medias'));
	}

	public function create(Request $request) {
		// return view('admin.new');
		$input = $request->all();
		$input['user_id'] = Auth::user()->id;
		$input['status'] = 1;

		if($file = $request->file('media')) {
    	$validator = Validator::make($request->all(), [
    		'media' => 'nullable|mimes:jpg,jpeg,png'
    	]);
    	if($validator->fails()) {
				Article::create($input);
				$request->session()->flash('article_created', 'The article was successfully created! Check your uploaded intro image it is not uploaded');
				return $this->all(new Request());
    	}
      $name = time() . $file->getClientOriginalName();
      $file->move('uploads', $name);
      $media = Media::create(['name'=>'/uploads/'.$name, 'user_id'=>Auth::user()->id]);
      $input['media_id'] = $media->id;
    }
		Article::create($input);	
		$request->session()->flash('article_created', 'The article was successfully created!');
		return $this->all(new Request());
	}

	public function createCategory(Request $request) {
		// return view('admin.new');
		$input = $request->all();
		$input['user_id'] = Auth::user()->id;
		$input['status'] = 1;
		Category::create($input);
		$request->session()->flash('category_created', 'The category was successfully created!');
		return $this->category(new Request());
	}

	public function deleteArticle(Request $request) {
		$article = Article::findOrFail($request->id);
		$article->status = 0;
		$article->delete();
		$request->session()->flash('article_trashed', 'The article was moved to trash!');
		return $this->all($request);
	}	

	public function restore(Request $request) {
		$article = Article::withTrashed()->findOrFail($request->id);		
		$article->restore();
		$article->status = 1;
		$article->update();
		$request->session()->flash('article_restored', 'The article was restored!');
		return $this->all($request);
	}

	public function permaDeleteArticle(Request $request) {
		$article = Article::withTrashed()->findOrFail($request->id);
		$article->forceDelete();
		$request->session()->flash('article_delete', 'The article was permanently deleted!');
		return $this->all($request);
	}

	public function edit(Request $request) {
		$categories = Category::pluck('name', 'id')->all();		
		$article = Article::findOrFail($request->id);
		if($request->update) {
			$input = $request->all();
			$input['updated_by'] = Auth::user()->id;

			if($file = $request->file('media')) {
	    	$validator = Validator::make($request->all(), [
	    		'media' => 'nullable|mimes:jpg,jpeg,png'
	    	]);
	    	if($validator->fails()) {
					$article->update($input);	
					$request->session()->flash('article_updated', 'The article was successfully updated! Check your uploaded intro image it is not uploaded');
					if($request->status == 0) {
						return $this->deleteArticle($request);
					}
					return view('admin.edit', compact('article', 'categories'));
	    	}
	      $name = time() . $file->getClientOriginalName();
	      $file->move('uploads', $name);
	      $media = Media::create(['name'=>'/uploads/'.$name, 'user_id'=>Auth::user()->id]);
	      $input['media_id'] = $media->id;
	    }

			$article->update($input);			
			$request->session()->flash('article_updated', 'The article was successfully updated!');
			if($request->status == 0) {
				return $this->deleteArticle($request);
			}
		}
		return view('admin.edit', compact('article', 'categories'));
	}

	public function editCategory(Request $request) {				
		$category = Category::findOrFail($request->id);

		if($request->update) {
			$input = $request->all();
			$input['updated_by'] = Auth::user()->id;
			$category->update($input);			
			$request->session()->flash('category_updated', 'The category was successfully updated!');
			if($request->status == 0) {
				return $this->deleteCategory($request);
			}
		}

		return view('admin.edit_category', compact('category'));
	}

	public function upload(Request $request) {
		$input = array();

		$validator = Validator::make($request->all(), [
      'file' => 'required|mimes:jpeg,bmp,png',
    ]);

    if ($validator->fails()) {    
     	return response('Fail', 400);
    }		


		$fileName = time().'_'.$request->file->getClientOriginalName();     
    $request->file->move(public_path('uploads'), $fileName);

    $input['name'] = '/uploads/'. $fileName;
    $input['user_id'] = Auth::user()->id;
    Media::create($input);    

    return response()
            ->json(['file_path'=>$input['name']]);
	}

	public function uploadMedia(Request $request) {
		$input = array();

		if (!$request->file('media')->isValid()) {
			$request->session()->flash('media_fail', 'The file is not valid!');    	
  		return $this->media(new Request());		
  	}

		$extension = strtolower($request->file('media')->extension());

		if(!in_array($extension, array('jpg', 'png', 'gif', 'jpeg'))) {
			$request->session()->flash('media_fail', 'The file is not valid type!');
  		return $this->media(new Request());  
  	}

		$fileName = time().'.'.$extension;     
    $request->file('media')->move(public_path('uploads'), $fileName);

    $input['name'] = '/uploads/'. $fileName;
    $input['user_id'] = Auth::user()->id;
    Media::create($input);

		$request->session()->flash('media_uploaded', 'The file was successfully uploaded!');    	
  	return $this->media(new Request());
    
	}

	public function deleteMedia(Request $request) {
		$media = Media::findOrFail($request->id);
		$filepath = public_path() . '/' . $media->name;
		if (file_exists($filepath))
			unlink($filepath);
		$media->delete();

		$request->session()->flash('media_deleted', 'The file was permanently deleted!');    	
  	return $this->media(new Request());
	}
}
