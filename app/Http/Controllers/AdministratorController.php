<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
	public function index() {
		return view('admin.index');
	}

	public function all() {
		return view('admin.all');
	}

	public function create() {
		return view('admin.create');
	}
}
