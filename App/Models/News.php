<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class News extends Eloquent
{
    protected $table = 'news';

    protected $fillable = ['title', 'body', 'created_at'];
	protected $appends = ['display_title'];

    public $timestamps = false;

    /**
     * Get the comments for the news article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

	/**
	 * Get the display title.
	 * 
	 * @return string
	 */
	public function getDisplayTitleAttribute()
	{
		return "############ NEWS " . $this->title . " ############";
	}
}
