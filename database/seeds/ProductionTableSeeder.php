<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('production')->insert([
            [
                'id' => '1',
                'user_id' => '1',
                'contact_number' => '7766',
                'company_name' => '㈱テスト',
                'slug' => '7766',
                'completed' => '未完成',
                'category_id' => '1',
                'product_name' => 'フレーム',
                'number' => '4',
                'materiar_id' => '2',
                'comment' => '',
                'image' => '',
                'date' => '2020-05-23',
                'shipment_location_id' => '2',
                'carrier_id' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '2',
                'user_id' => '2',
                'contact_number' => '7766',
                'company_name' => '㈱なになに',
                'slug' => '7766',
                'completed' => '未完成',
                'category_id' => '1',
                'product_name' => 'ケース',
                'number' => '4',
                'materiar_id' => '2',
                'comment' => '',
                'image' => '',
                'date' => '2020-05-25',
                'shipment_location_id' => '3',
                'carrier_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '3',
                'user_id' => '3',
                'contact_number' => '7766',
                'company_name' => '㈱はてはて',
                'slug' => '7766',
                'completed' => '未完成',
                'category_id' => '1',
                'product_name' => '箱',
                'number' => '4',
                'materiar_id' => '2',
                'comment' => '',
                'image' => '',
                'date' => '2020-05-20',
                'shipment_location_id' => '3',
                'carrier_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
