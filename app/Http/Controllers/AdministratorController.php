<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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
		$search = session('search');
		$status = session('status');
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
		if($request->page || $request->status || $request->search || $request->clear) {
    	return view('admin.load_articles', compact('articles'));
    }
		return view('admin.all', compact('articles'));
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

	public function category() {

	}

	public function upload(Request $request) {
		$input = array();
		$request->validate([
      'file' => 'required|mimes:jpg,png,gif,mp4',
    ]); 

		$fileName = 'uploads/'.time().'-'.$request->file->getClientOriginalName().'.'.$request->file->extension();     
    $request->file->move(public_path('uploads'), $fileName);

    $input['name'] = $fileName;
    $input['user_id'] = Auth::user()->id;
    Media::create($input);

    return response()
            ->json(['file_path'=>$fileName]);
	}
}
