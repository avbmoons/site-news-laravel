<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\NewsStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $nowData = now();
        for ($i = 0; $i < 40; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'author' => \fake()->userName(),
                'source_id' => random_int(1, 15),
                'status' => NewsStatus::DRAFT->value,
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ];
        }
        return $data;
    }
}
