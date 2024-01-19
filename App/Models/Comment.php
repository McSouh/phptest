<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{
	protected $table = 'comment';
	
	protected $fillable = ['news_id', 'body', 'created_at'];
	protected $appends = ['display_comment'];

	public $timestamps = false;

	/**
     * Get the news associated with the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function news()
	{
		return $this->belongsTo(News::class);
	}

	/**
	 * Get the display comment.
	 * 
	 * @return string
	 */
	public function getDisplayCommentAttribute()
	{
		return "Comment "  . $this->id . " : " . $this->body;
	}
}