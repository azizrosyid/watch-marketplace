<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => User::where('role', 'customer')->get()->random()->id,
            "payment_method" => $this->faker->randomElement(['COD', 'Transfer']),
            "shipment_method" => $this->faker->randomElement(['Ambil Sendiri', 'Kurir Penjual']),
            "total_price" => null,
        ];
    }
}
