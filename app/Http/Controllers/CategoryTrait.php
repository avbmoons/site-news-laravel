<?php

declare(strict_types=1);

namespace App\Http\Controllers;

trait CategoryTrait
{
    public function getCategories(): array
    {
        return $this->categories;
    }

    public function getCategoryIdBySlug($slug)
    {
        $id = null;
        foreach ($this->getCategories() as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public function getCategoryNameBySlug($slug)
    {
        $id = $this->getCategoryIdBySlug($slug);
        $category = $this->getCategoryById($id);
        if ($category != [])
            return $category['title'];
        else return null;
    }

    public function getCategoryById($id)
    {
        foreach (static::getCategories() as $categories) {
            if ($categories['id'] == $id) {
                return $categories;
            }
        }
        return null;
    }
}
