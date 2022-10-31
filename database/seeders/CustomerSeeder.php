<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<25;$i++){
        DB::table('customers')->insert([
            'name' => Str::random(12),
            'email' => Str::random(10),
            'phone_number' => Str::random(10),
            'created_at' => now()
        ]);
        }

    }
}
