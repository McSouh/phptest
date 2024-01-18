<?php

define('ROOT', __DIR__);

require_once './bootstrap.php';

use App\Utils\NewsManager;

$newsManager = new NewsManager();

foreach ($newsManager->listNews() as $news) {
	echo("############ NEWS " . $news->title . " ############\n");
	echo($news->body . "\n");
	foreach ($news->comments as $comment) {
		echo("Comment "  . " : " . $comment->body . "\n");
	}
}
