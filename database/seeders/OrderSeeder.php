<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('orders')->insert($this->getData());
    }

    private function getData(): array
    {
        $nowData = now();
        for ($i = 0; $i < 12; $i++) {
            $data[] = [
                'username' => \fake()->userName(),
                'userphone' => \fake()->phoneNumber(),
                'usermail' => \fake()->email(),
                'orderinfo' => \fake()->text(100),
                'status' => OrderStatus::DRAFT->value,
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ];
        }
        return $data;
    }
}
