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
        foreach ($links as $link) {
            array_push($rssLinks, $link->name);
        }

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
        $link = new ParsingResourse;
        $link->fill($request->all())->save();
        return redirect()->route('admin.home')
            ->with(['success' => 'Ссылка на ресурс добавлена!']);
    }
}
