<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class subjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name'=>'তথ্য ও যোগাযোগ প্রযুক্তি'
        ]);
        DB::table('subjects')->insert([
            'name'=>'হিসাব বিজ্ঞান প্রথম পত্র'
        ]);
        DB::table('subjects')->insert([
            'name'=>'হিসাব বিজ্ঞান দ্বিতীয় পত্র'
        ]);
        DB::table('subjects')->insert([
            'name'=>'অর্থনীতি'
        ]);
    }
}
