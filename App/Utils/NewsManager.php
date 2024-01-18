<?php

namespace App\Utils;

use App\Models\News;

class NewsManager
{
	private static $instance = null;

	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

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