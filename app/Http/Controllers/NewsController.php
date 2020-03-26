<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function rubrics()
    {
        $sql = 'SELECT * FROM rubrics ORDER BY id';
        $rubrics = \DB::select($sql);

        return view('news.rubrics', ['rubrics' => $rubrics]);
    }

    public function rubricsNews($rubricsId)
    {
        $sql = 'SELECT id, title, rubrics_id FROM news WHERE rubrics_id = :rubrics_id';
        $rubricsNews = \DB::select($sql, [':rubrics_id' => $rubricsId]);

        return view('news.rubricsNews', ['rubricsNews' => $rubricsNews]);
    }

    public function cardNews($rubricsId, $id)
    {
        $sqlNews = 'SELECT id, title, content, rubrics_id FROM news WHERE id = :id';
        $news = \DB::select($sqlNews, [':id' => $id]);

        $sqlComments = '
            SELECT
                n.id, c.name, c.content
            FROM
                 news n
            JOIN comments c ON n.id = c.news_id
            WHERE n.id = :id
            ORDER BY c.created_at DESC
        ';
        $comments = \DB::select($sqlComments, [':id' => $id]);

        return view('news.cardNews', [
            'news' => $news,
            'comments' => $comments,
        ]);
    }
}
