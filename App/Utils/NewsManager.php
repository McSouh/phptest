<?php

namespace App\Utils;

use App\Models\News;

class NewsManager
{
    /**
     * List all news.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listNews()
    {
        return News::all();
    }

    /**
     * Add a record to the news table.
     *
     * @param string $title
     * @param string $body
     * @return int The ID of the inserted news
     */
    public function addNews($title, $body)
    {
        try {

            $news = new News([
                'title' => $title,
                'body' => $body,
				'created_at' => date('Y-m-d H:i:s')
            ]);

            $news->save();

            return $news->id;

        } catch (\Exception $e) {

			return false;

        }
    }

    /**
     * Delete a news along with its associated comments.
     *
     * @param int $id
     * @return bool
     */
    public function deleteNews($id)
    {
        try {

            $news = News::find($id);
            $news->comments()->delete();
            $news->delete();
            return true;

        } catch (\Exception $e) {

            return false;

        }
    }
}
