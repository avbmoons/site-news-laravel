<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\MailStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('mails')->insert($this->getData());
    }

    private function getData(): array
    {
        $nowData = now();
        for ($i = 0; $i < 12; $i++) {
            $data[] = [
                'username' => \fake()->userName(),
                'comment' => \fake()->text(100),
                'status' => MailStatus::DRAFT->value,
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ];
        }
        return $data;
    }
}
