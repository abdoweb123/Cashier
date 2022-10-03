<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class testFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_name'  =>$this->faker->name('male'),
            'customer_email'  =>$this->faker->email(),
            'customer_phone'  =>$this->faker->phoneNumber(),
            'company_name'  =>$this->faker->name(),
            'invoice_number'  =>$this->faker->numberBetween(1,9),
            'invoice_date'  =>$this->faker->date(),
            'sub_total'=>'5040',
            'discount_type'=>'fixed',
            'discount_value'=>'0',
            'vat_value'=>'5',
            'shipping'=>'150',
            'total_due'=>'7048',
        ];
    }
}
