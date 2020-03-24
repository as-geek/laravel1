<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function addComment(Request $request)
    {
        if ($request->isMethod('post')) {

            $name = $request->post('userName');
            $content = $request->post('text');
            $rubricsId = $request->post('rubricsId');
            $newsId = $request->post('newsId');
            $sql = "
                INSERT INTO
                    comments (name, content, news_id)
                VALUES
                    (:name, :content, :news_id);
            ";

            $addComment = \DB::statement($sql, [
                ':name' => $name,
                ':content' => $content,
                ':news_id' => $newsId
            ]);

            return redirect()->route('news::cardNews', [
                'rubricsId' => $rubricsId,
                'id' => $newsId
            ]);
        }
    }
}
