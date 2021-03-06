<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Rubrics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', ['news' => News::getListNewsAll()]);
    }

    public function create()
    {
        return view('admin.news.create', ['rubrics' => Rubrics::getRubrics()]);
    }

    public function saveCreate(Request $request)
    {
        $news = new News();
        $news->fill($request->all());
        $news->save();

        return redirect()->route('admin::news::create');
    }

    public function update($id)
    {
        return view('admin.news.update', [
            'cardNews' => News::getCardNews($id)->first(),
            'rubrics' => Rubrics::getRubrics()
        ]);
    }

    public function saveUpdate($id, Request $request)
    {
        /** @var News $news */
        $news = News::find($id);
        $news->fill($request->all());
        $news->save();

        return redirect()->route('admin::news::index');
    }

    public function delete($id)
    {
        News::destroy([$id]);
        return redirect()->route("admin::news::index");
    }
}
