<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $rubrics = [
        'politics' => 'Политика',
        'business' => 'Бизнес',
        'sports' => 'Спорт',
        'games' => 'Игры'
    ];

    private $news = [
        'politics' => [
            'Title1' => 'Text1',
            'Title2' => 'Text2'
        ],
        'business' => [
            'Title3' => 'Text3',
            'Title4' => 'Text4'
        ],
        'sports' => [
            'Title5' => 'Text5',
            'Title6' => 'Text6'
        ],
        'games' => [
            'Title7' => 'Text7',
            'Title8' => 'Text8'
        ]
    ];

    public function rubrics()
    {
        return view('news.rubrics', ['rubrics' => $this->rubrics]);
    }

    public function rubricsNews($name)
    {
        return view('news.rubricsNews', ['rubricsNews' => $this->news[$name], 'name' => $name]);
    }

    public function cardNews($name, $title)
    {
        return view('news.cardNews', ['title' => $title, 'item' => $this->news[$name][$title]]);
    }
}
