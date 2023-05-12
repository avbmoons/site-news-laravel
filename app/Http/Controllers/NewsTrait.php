<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Collection;

trait NewsTrait
{

    public static function getNews(): Collection
    {
        return News::getNews();
    }

    public static function getNewsId($id): ?array
    {
        foreach (static::getNews() as $news) {
            if ($news['id'] == $id) {
                return $news;
            }
        }
        return null;
    }
}
