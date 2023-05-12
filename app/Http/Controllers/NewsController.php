<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\NewsTrait;
use Illuminate\Contracts\View\View;
use App\Models\News;
use App\QueryBuilders\NewsQueryBuilder;

class NewsController extends Controller
{

    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        $newsList = $newsQueryBuilder->getNewsWithPagination();

        return \view('news.index', ['newsList' => $newsList]);
    }

    public function show($id, News $news): View
    {

        return \view('news.show')->with('news', $news->getNewsById($id));
    }
}
