<?php


namespace App\Services;


use App\Http\Controllers\ParserController;
use App\Models\PartnerNews;
use Orchestra\Parser\Xml\Document;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XmlParserService
{
    public function parse($source)
    {
        /** @var Document $xml */
        $xml = XmlParser::load($source);

        $data = $xml->parse([
            'news' => ['uses' => 'channel.item[title,description,link]']
        ]);

        foreach ($data['news'] as $value) {
            $news = new PartnerNews();
            $news->fill($value);
            $news->save();
        }

        return (new ParserController())->done();
    }
}
