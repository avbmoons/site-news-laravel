<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Order;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class OrdersQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Order::query();
    }


    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getOrderByStatus(string $status): Collection
    {
        return Order::query()->where('status', $status)->get();
    }

    public function getOrdersWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    //

    public function setModel(): void
    {
        $this->model = Order::query();
    }
}
