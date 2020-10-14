<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Create_DeliveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('create_delivery')->insert([
        [
            'car_id' => '1',
            'car_name' => 'ヤマト運輸',
        ],
        [
            'car_id' => '2',
            'car_name' => '佐川急便',
        ],
        [
            'car_id' => '3',
            'car_name' => 'トナミ運送',
        ],
        [
            'car_id' => '4',
            'car_name' => '西濃運輸',
        ],
        [
            'car_id' => '5',
            'car_name' => 'DHL',
        ],
        [
            'car_id' => '6',
            'car_name' => 'その他',
        ],
        ]);
    }
}
