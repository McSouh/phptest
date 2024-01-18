<?php

namespace App\Utils;

use App\Models\News;

class NewsManager
{
	/**
	* list all news
	*/
	public function listNews()
	{
		return News::all();
	}

	/**
	* add a record in news table
	*/
	public function addNews($title, $body)
	{
		$news = new News([
			'title' => $title,
			'body' => $body,
			'created_at' => date('Y-m-d H:i:s')
		]);

		$news->save();

		return $news->id;
	}

	/**
	* deletes a news, and also linked comments
	*/
	public function deleteNews($id)
	{
		$news = News::find($id);
		$news->comments()->delete();
		return $news->delete();
	}
}