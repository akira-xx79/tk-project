<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Shipment_LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipment_locations')->insert([
        [
            'sl_id' => '1',
            'sl_name' => '事務所',
        ],
        [
            'sl_id' => '2',
            'sl_name' => '工場',
        ],
        [
            'sl_id' => '3',
            'sl_name' => '配達',
        ],
        [
            'sl_id' => '4',
            'sl_name' => '引き取り',
        ],
        ]);
    }
}
