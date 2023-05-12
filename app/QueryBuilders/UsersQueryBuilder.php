<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class UsersQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }


    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getUserByStatus(string $status): Collection
    {
        return User::query()->where('status', $status)->get();
    }

    public function getUsersWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    //

    public function setModel(): void
    {
        $this->model = User::query();
    }
}
