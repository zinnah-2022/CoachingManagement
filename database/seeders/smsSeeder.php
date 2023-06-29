<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class smsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('messages')->insert([
           'unpaid'=>'This is a gentle reminder regarding the fees payment due on previous month. Please pay your fees as soon as possible.
(Zinnah sir)',
           'paid'=>'I am sending you a message to inform you that your tuition fee payment has been successful. Thank you
(Zinnah Sir)',
           'greeting'=>'this is greeting',
           'close'=>'আজ পড়াবোনা। আগামী ক্লাশে আসবেন। ধন্যবাদ (জিন্নাহ স্যার)'
       ]);
    }
}
