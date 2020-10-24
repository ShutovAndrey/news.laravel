<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
public function index(){
    $xml = XmlParser::load('https://lenta.ru/rss');
    $data = $xml->parse([
        'title' => ['uses' => 'channel.title'],
        'description' => ['uses' => 'channel.description'],
        'link' => ['uses' => 'channel.description'],
        'image' => ['uses' => 'channel.image.url'],
        'category' => ['uses' => 'channel.category'],
        'news' => ['uses' => 'channel.item[title,link,guid,description,category,pubDate,enclosure::url]'],
    ]);

    foreach ($data['news'] as $news){
        $news;
    };
}
}
