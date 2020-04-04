<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\News;
use App\Models\Rubrics;

class NewsController extends Controller
{
    public function rubrics()
    {
        return view('news.rubrics', ['rubrics' => Rubrics::getRubrics()]);
    }

    public function listNews($rubricsId)
    {
        $listNews = News::getListNews($rubricsId);
        return view('news.listNews', ['listNews' => $listNews]);
    }

    public function cardNews($id)
    {
        $news = News::getCardNews($id);
        $comments = Comments::getCommentsToNews($id);

        return view('news.cardNews', [
            'news' => $news,
            'comments' => $comments,
        ]);
    }
}
