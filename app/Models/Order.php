<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'username',
        'userphone',
        'usermail',
        'orderinfo',
        'status',
    ];

    public function getOrders(): Collection
    {
        return DB::table($this->table)->select(['id', 'username', 'userphone', 'usermail', 'orderinfo', 'status', 'created_at', 'updated_at'])->get();
    }

    public function getOrderlById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'username', 'userphone', 'usermail', 'orderinfo', 'status', 'created_at', 'updated_at']);
    }
}
