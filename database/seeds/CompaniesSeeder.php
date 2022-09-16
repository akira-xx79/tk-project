<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name'              => 'seam',
            'email'             => 'seam@example.com',
            'password'          => Hash::make('12345678'),
            'remember_token'    => Str::random(10),
        ]);
    }
}