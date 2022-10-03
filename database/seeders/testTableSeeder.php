<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class testTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\test::factory(10)->create();

//        php artisan db:seed --class=testTableSeeder
    }
}
