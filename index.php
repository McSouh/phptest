<?php

define('ROOT', __DIR__);

require_once './autoload.php';
require_once './bootstrap.php';

use App\Utils\NewsManager;
use App\Utils\CommentManager;

foreach (NewsManager::getInstance()->listNews() as $news) {
	echo("############ NEWS " . $news->title . " ############\n");
	echo($news->body . "\n");
	foreach (CommentManager::getInstance()->listComments() as $comment) {
		if ($comment->news_id == $news->id) {
			echo("Comment "  . " : " . $comment->body . "\n");
		}
	}
}

// $commentManager = CommentManager::getInstance();
// $c = $commentManager->listComments();