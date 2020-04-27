<?php

namespace App\Http\Controllers;

use App\Models\PartnerNews;
use App\Models\PartnerResources;

class PartnerNewsController extends Controller
{
    public function partnerRubrics()
    {
        return view('partner.rubrics', ['rubrics' => PartnerResources::getRubrics()]);
    }

    public function parsing($rubrics, ParserController $parserController)
    {
        $parserController->index($rubrics);
    }

    public function listPartnerNews()
    {
        return view('partner.listNews', ['listPartnerNews' => PartnerNews::all()]);
    }

}
