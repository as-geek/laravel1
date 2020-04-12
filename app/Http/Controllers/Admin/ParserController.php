<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Document;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        /** @var Document $xml */
        $xml = XmlParser::load('https://www.gazeta.ru/export/rss/lenta.xml');

        $data = $xml->parse([
            'news' => ['uses' => 'channel.item[title,description,link]']
        ]);

        return $data;
    }
}

