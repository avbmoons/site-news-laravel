<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryScrollComposer
{
    public function composer(View $view)
    {
        return $view->with('categories', CategoryScrollComposer::class);
    }
}
