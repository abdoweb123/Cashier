<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class testDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name'  =>$this->faker->name(),
            'unit'  =>'gram',
            'test_id'  =>$this->faker->randomNumber(1,10),
            'quantity'  =>$this->faker->numberBetween(1,9),
            'unit_price'  =>$this->faker->numberBetween(1,9),
            'row_sub_total'  =>$this->faker->numberBetween(1,9),


        ];
    }
}
