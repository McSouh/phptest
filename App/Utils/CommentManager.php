<?php

namespace App\Utils;

use App\Models\Comment;

class CommentManager
{
    /**
     * List all comments.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listComments()
    {
        return Comment::all();
    }

    /**
     * Add a comment for a specific news.
     *
     * @param string $body
     * @param int $newsId
     * @return int|false The ID of the inserted comment or false on failure
     */
    public function addCommentForNews($body, $newsId)
    {
        try {

            $comment = new Comment([
                'body' => $body,
                'news_id' => $newsId,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            $comment->save();

            return $comment->id;

        } catch (\Exception $e) {

            return false;

        }
    }

    /**
     * Delete a comment.
     *
     * @param int $id
     * @return bool
     */
    public function deleteComment($id)
    {
        try {

            $comment = Comment::find($id);
            return $comment->delete();

        } catch (\Exception $e) {

            return false;
			
        }
    }
}