<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class News extends Eloquent
{
	protected $table = 'news';
	
	protected $fillable = ['title', 'body', 'created_at'];

	public $timestamps = false;

	public function comments()
	{
		return $this->hasMany('App\Models\Comment');
	}

	public static function boot()
	{
		parent::boot();
		self::deleting(function(News $news) {
			$news->comments->each(function($comment) {
				$comment->delete();
			});
		});
	}
}