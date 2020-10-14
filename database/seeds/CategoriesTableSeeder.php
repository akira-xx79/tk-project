<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories') ->insert([
        [
            'cat_id' => '1',
            'cat_name' => '新規制作',
        ],
        [
            'cat_id' => '2',
            'cat_name' => 'リピート品',
        ],
        [
            'cat_id' => '3',
            'cat_name' => '追加工',
        ],
        [
            'cat_id' => '4',
            'cat_name' => '補修',
        ],
        [
            'cat_id' => '5',
            'cat_name' => 'バリ取り/タップ・穴あけ',
        ],
        [
            'cat_id' => '6',
            'cat_name' => '現場作業'
        ],
        ]);
    }
}
