<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Rubrics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', ['news' => News::getListNewsAll()]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $news = new News();
            $news->fill($request->all());
            $news->save();

            return redirect()->route('admin::news::create');
        }

        return view('admin.news.create', ['rubrics' => Rubrics::getRubrics()]);
    }

    public function update($id, Request $request)
    {
        if ($request->isMethod('post'))
        {
            /** @var News $news */
            $news = News::find($id);
            $news->fill($request->all());
            $news->save();

            return redirect()->route('admin::news::index');
        }

        return view('admin.news.update', [
            'cardNews' => News::getCardNews($id)->first(),
            'rubrics' => Rubrics::getRubrics()
        ]);
    }

    public function delete($id)
    {
        News::destroy([$id]);
        return redirect()->route("admin::news::index");
    }
}
