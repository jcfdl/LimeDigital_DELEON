<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'id', 'user_id', 'category_id', 'title', 'body', 'status', 'views', 'updated_by'
	];

	protected $dates = ['deleted_at'];
}
