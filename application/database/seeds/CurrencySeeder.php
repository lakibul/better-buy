<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            ['id' => 1, 'name' => 'USD', 'symbol' => '$', 'code' => 'USD', 'exchange_rate' => '1', 'status' => '1'],
        ]);
    }
}
