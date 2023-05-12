<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class NewsSource extends Model
{
    use HasFactory;

    protected $table = 'news_sources';

    protected $fillable = [
        'title',
        'url',
        'status',
        'description',
        'image',
    ];

    public function getNewsSource(): Collection
    {
        return DB::table($this->table)->select(['id', 'title', 'description', 'url', 'status', 'created_at', 'updated_at', 'image'])->get();
    }

    public function getNewsSourceById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'title', 'description', 'url', 'status', 'created_at', 'updated_at', 'image']);
    }
}
