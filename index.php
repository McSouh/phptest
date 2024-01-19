<?php

define('ROOT', __DIR__);

require_once './bootstrap.php';

use App\Utils\NewsManager;

$newsManager = new NewsManager();

foreach ($newsManager->listNews() as $news) {
	echo $news->display_title . "\n";
	echo $news->body . "\n";
	foreach ($news->comments as $comment) {
		echo $comment->display_comment . "\n";
	}
}
