<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $urls = [
            'https://news.rambler.ru/rss/army',
            'https://news.rambler.ru/rss/world/',
            'https://news.rambler.ru/rss/tech/',
            'https://news.rambler.ru/rss/technology/',
            'https://news.rambler.ru/rss/gifts/',
            'https://news.rambler.ru/rss/holiday/',
            'https://news.rambler.ru/rss/moscow_city/',
        ];

        foreach ($urls as $url) {
            \dispatch(new JobNewsParsing($url));
        }
        return \view('admin.parser.index');
    }
}
