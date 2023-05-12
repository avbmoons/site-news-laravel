<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'status',
        'description',
        'image',
    ];

    protected $casts = [
        'news_ids' => 'array',
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'category_has_news', 'category_id', 'news_id', 'id', 'id');
    }

    public function getCategories(): Collection
    {
        return DB::table($this->table)->select(['id', 'title', 'slug', 'description', 'status', 'created_at', 'updated_at', 'image'])->get();
    }

    public function getCategoryById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'title', 'slug', 'description', 'status', 'created_at', 'updated_at', 'image']);
    }

    public function getCategoryByTitle(string $title)
    {
        return DB::table($this->table)->find($title, ['id', 'title', 'slug', 'description', 'status', 'created_at', 'updated_at', 'image']);
    }

    public function getCategoryIdBySlug($slug): mixed
    {
        return DB::table($this->table)->find($slug, ['id']);
    }

    public function getCategoryIdByTitle($title)
    {
        return DB::table($this->table)->find($title, ['id']);
    }

    public function getCategoryNameBySlug($slug): mixed
    {
        return DB::table($this->table)->find($slug, ['title']);
    }

    public function getCategoryNameById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['title']);
    }

    public function getCategoryTitle()
    {
        return DB::table($this->table)->select(['title'])->get();
    }
}
