<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ParserController;
use App\Models\PartnerNews;

class PartnerNewsController extends Controller
{
    public function index()
    {
        $data = (new ParserController())->index();

        PartnerNews::deletePartnerNews();

        foreach ($data['news'] as $value) {
            $news = new PartnerNews();
            $news->fill($value);
            $news->save();
        }

        return view('partner.index', ['news' => PartnerNews::all()]);
    }
}
