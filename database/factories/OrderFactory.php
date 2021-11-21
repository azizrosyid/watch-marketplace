<?php

namespace Database\Factories;

use App\Models\Store;
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
            "store_id" => Store::all()->random()->id,
            "payment_method" => $this->faker->randomElement(['COD', 'Transfer']),
            "shipment_method" => $this->faker->randomElement(['Ambil Sendiri', 'Kurir Penjual']),
            "status" => $this->faker->randomElement(['UNPAID', 'PAID', 'SHIPPED', 'DELIVERED', 'READY_TO_PICKUP', 'PICKED_UP', 'CANCELLED']),
            "total_price" => null,
        ];
    }
}
