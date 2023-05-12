<?php

declare(strict_types=1);

namespace Database\Seeders;

use Doctrine\ORM\Mapping\Id;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $nowData = now();
        $data = [
            1 => [
                'id' => 1,
                'title' => 'Спорт',
                'slug' => 'sport',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            2 => [
                'id' => 2,
                'title' => 'Политика',
                'slug' => 'politics',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            3 => [
                'id' => 3,
                'title' => 'Экология',
                'slug' => 'ecology',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            4 => [
                'id' => 4,
                'title' => 'Экономика',
                'slug' => 'economy',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            5 => [
                'id' => 5,
                'title' => 'Искусство',
                'slug' => 'art',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            6 => [
                'id' => 6,
                'title' => 'Общество',
                'slug' => 'society',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            7 => [
                'id' => 7,
                'title' => 'Культура',
                'slug' => 'culture',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            8 => [
                'id' => 8,
                'title' => 'Технологии',
                'slug' => 'technology',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            9 => [
                'id' => 9,
                'title' => 'Авто',
                'slug' => 'auto',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            10 => [
                'id' => 10,
                'title' => 'В мире',
                'slug' => 'world',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            11 => [
                'id' => 11,
                'title' => 'Наука',
                'slug' => 'science',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            12 => [
                'id' => 12,
                'title' => 'Техника',
                'slug' => 'technic',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
        ];

        return $data;
    }
}
