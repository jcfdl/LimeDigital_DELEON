<?php

namespace App\Http\Controllers;

use App\User;
use App\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function profile(Request $request) {
		$user = User::findOrFail(Auth::user()->id);
		return view('admin.profile', compact('user'));
	}

	public function saveProfile(Request $request) {
		if(trim($request->password) == '') {
      $input = $request->except('password');
    } else {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
    }
    $user = User::findOrFail(Auth::user()->id);    
    if($file = $request->file('media')) {
    	$validator = Validator::make($request->all(), [
    		'media' => 'nullable|mimes:jpg,jpeg,png|dimensions:width=283,height=283'
    	]);
    	if($validator->fails()) {
				$request->session()->flash('profile_fail', 'The image is not correct! Please change it!');
    		return $this->profile(new Request());
    	}
      $name = time() . $file->getClientOriginalName();
      $file->move('uploads', $name);
      $media = Media::create(['name'=>'uploads/'.$name, 'user_id'=>Auth::user()->id]);
      $input['media_id'] = $media->id;
    }
    $user->update($input);             
    $request->session()->flash('profile_success', 'Your profile has been updated');
    return $this->profile($request);
	}
}
