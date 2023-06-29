<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
           'email'=>'01716571233',
           'password'=>Hash::make('123456'),
           'name'=>'admin',
           'subject'=>'nothing',
           'day'=>'friday',
           'time'=>'8:00',
           'date'=>'2023-02-12',
           'image'=>'defualt.png',
           'roll'=>'1',
       ]);
    }
}
