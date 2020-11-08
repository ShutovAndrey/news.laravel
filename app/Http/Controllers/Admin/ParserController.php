<?php

namespace App\Http\Controllers\Admin;

use App\Services\XMLParserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Jobs\NewsParsing;
use App\ParsingResourse;

class ParserController extends Controller
{
    public function index(XMLParserService $parserService)
    {
        $links = ParsingResourse::all();
        $rssLinks = [];
        foreach ($links as $link ){
            array_push($rssLinks, $link->name);
        }
       /* $rssLinks = [
           // 'https://life.ru/rss', долго парсит
            'https://regnum.ru/rss',
            'https://www.rt.com/rss',

            'https://lenta.ru/rss/news',
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss',

        ];*/

        foreach ($rssLinks as $rssLink) {

            NewsParsing::dispatch($rssLink);
        }

        return redirect()->route('admin.home');

    }

    public function create()
    {
        return view('admin.resourse');
    }

    public function rssStore(Request $request)
    {
        $request->validate(ParsingResourse::rules());
        $link=new ParsingResourse;
       $link->fill($request->all())->save();
        return redirect()->route('admin.home')
            ->with(['success' => 'Ссылка на ресурс добавлена!']);
    }
}
