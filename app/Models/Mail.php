<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Mail extends Model
{
    use HasFactory;

    protected $table = 'mails';

    protected $fillable = [
        'username',
        'comment',
        'status',
    ];

    public function getMails(): Collection
    {
        return DB::table($this->table)->select(['id', 'username', 'comment', 'status', 'created_at', 'updated_at'])->get();
    }

    public function getMailById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'username', 'comment', 'status', 'created_at', 'updated_at', 'source_id']);
    }
}
