<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'id', 'user_id', 'category_id', 'title', 'body', 'status', 'views', 'updated_by', 'media_id'
	];

	protected $dates = ['deleted_at'];

	public function category() {
		return $this->belongsTo('App\Category');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function updatedBy() {
		return $this->belongsTo('App\User', 'updated_by', 'id');
	}

	public function media() {
    return $this->belongsTo('App\Media');
  }

	public function getCreatedAtAttribute($value)
	{
    return Carbon::parse($value)->format('l, F d, Y');
	}

	public function readMore() {
		return substr($this->attributes['body'], 0, 20);
	}
}
