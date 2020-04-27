<?php

namespace App\Http\Controllers;

use App\Jobs\NewsParsing;
use App\Models\PartnerResources;

class ParserController extends Controller
{
    public function index($rubrics)
    {
        $sources = PartnerResources::getListByRubrics($rubrics);

        foreach ($sources as $source) {
            $sourceLink = $sources->first()->link;
            NewsParsing::dispatch($sourceLink);
        }
    }

    public function done()
    {
        return redirect()->route('news::listPartnerNews');
    }
}

