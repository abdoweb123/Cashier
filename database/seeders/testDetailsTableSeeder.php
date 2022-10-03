<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class testDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\testDetails::factory(10)->create();

//        php artisan db:seed --class=testDetailsTableSeeder
    }
}
