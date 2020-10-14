<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materiaries')->insert([
        [
            'mat_id' => '1',
            'mat_name' => 'Ti',
        ],
        [
            'mat_id' => '2',
            'mat_name' => 'Ti/64',
        ],
        [
            'mat_id' => '3',
            'mat_name' => 'Ti/SUS',
        ],
        [
            'mat_id' => '4',
            'mat_name' => 'SUS304',
        ],
        [
            'mat_id' => '5',
            'mat_name' => 'SUS316',
        ],
        [
            'mat_id' => '6',
            'mat_name' => 'SUS316L',
        ],
        [
            'mat_id' => '7',
            'mat_name' => '樹脂',
        ],
        [
            'mat_id' => '8',
            'mat_name' => 'その他',
        ],
        ]);
    }
}
