<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evaluate;


class EvaluatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'evaluate' => '5',
            'user_id' => '1',
            'shop_id' => '1',
        ];
        Evaluate::create($param);
    }
}
