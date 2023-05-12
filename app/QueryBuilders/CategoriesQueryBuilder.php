<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Category;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class CategoriesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }


    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getCategoryByStatus(string $status): Collection
    {
        return Category::query()->where('status', $status)->get();
    }

    public function getCategoriesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    //

    public function setModel(): void
    {
        $this->model = Category::query();
    }
}
