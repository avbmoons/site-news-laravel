<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Http\Controllers\CategoryTrait;
use App\Http\Controllers\NewsTrait;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    use CategoryTrait;
    use NewsTrait;

    public function index(Category $category)
    {
        return \view('category.index')
            ->with('categories', $category->getCategories());
    }

    public function show(News $news, Category $category, $slug)
    {
        $news = Category::where('slug', $slug)->first()->news;

        return \view('category.show')
            ->with('news', $news);
    }
}
