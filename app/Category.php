<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'id', 'name', 'description', 'user_id', 'status', 'updated_by'
	];

	protected $dates = ['deleted_at'];
}
