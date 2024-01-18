<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{
	protected $table = 'comment';
	
	protected $fillable = ['news_id', 'body', 'created_at'];
}