<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\NewsSource;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsSourcesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = NewsSource::query();
    }


    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getNewsSourceByStatus(string $status): Collection
    {
        return NewsSource::query()->where('status', $status)->get();
    }

    public function getNewsSourcesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    //

    public function setModel(): void
    {
        $this->model = NewsSource::query();
    }
}
