<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Mail;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class MailsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Mail::query();
    }


    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getMaileByStatus(string $status): Collection
    {
        return Mail::query()->where('status', $status)->get();
    }

    public function getMailsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    //

    public function setModel(): void
    {
        $this->model = Mail::query();
    }
}
