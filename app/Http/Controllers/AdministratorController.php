<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Media;
use App\Category;
use App\Article;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
	public function index() {
		return view('admin.index');
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
									->paginate(1);
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
									->paginate(20);
		$medias->withPath('/administrator/media');
		if($request->page || $request->media_search || $request->clear) {
    	return view('admin.load_media', compact('medias'));
    }
		return view('admin.media', compact('medias'));
	}

	public function category() {

	}

	public function new() {
		$categories = Category::pluck('name', 'id')->all();
		return view('admin.new', compact('categories'));
	}

	public function create(Request $request) {
		// return view('admin.new');
		$input = $request->all();
		$input['user_id'] = Auth::user()->id;
		$input['status'] = 1;
		Article::create($input);
		$request->session()->flash('article_created', 'The article was successfully created!');
		return $this->all($request);
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
			$article->update($input);			
			$request->session()->flash('article_updated', 'The article was successfully updated!');
			if($request->status == 0) {
				return $this->deleteArticle($request);
			}
		}
		return view('admin.edit', compact('article', 'categories'));
	}

	public function upload(Request $request) {
		$input = array();

		$validator = Validator::make($request->all(), [
      'file' => 'required|mimes:jpeg,bmp,png',
    ]);

    if ($validator->fails()) {    
     	return response('Fail', 400);
    }		


		$fileName = time().'.'.$request->file->extension();     
    $request->file->move(public_path('uploads'), $fileName);

    $input['name'] = 'uploads/'. $fileName;
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

    $input['name'] = 'uploads/'. $fileName;
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
