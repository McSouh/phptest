<?php

namespace App\Utils;

use App\Models\Comment;

class CommentManager
{
	public function listComments()
	{
		return Comment::all();
	}

	public function addCommentForNews($body, $newsId)
	{
		$comment = new Comment([
			'body' => $body,
			'news_id' => $newsId,
			'created_at' => date('Y-m-d H:i:s')
		]);

		$comment->save();

		return $comment->id;
	}

	public function deleteComment($id)
	{
		$comment = Comment::find($id);
		return $comment->delete();
	}
}