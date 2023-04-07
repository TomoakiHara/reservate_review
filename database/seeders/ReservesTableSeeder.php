<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserve;

class ReservesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'shop_id' => '1',
            'reserve_date' => '2023-01-16',
            'reserve_time' => '17:00',
            'number' => '5',
        ];
        Reserve::create($param);
    }
}
