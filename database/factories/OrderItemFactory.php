<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::all()->random();
        $quantity = $this->faker->numberBetween(1, ($product->stock % 2) + 1);
        return [
            "order_id" => Order::all()->random()->id,
            "product_id" => $product->id,
            "store_id" => $product->store->id,
            "quantity" => $quantity,
            "price" => $product->price * $quantity,
            "status" => $this->faker->randomElement(['UNPAID', 'PAID', 'SHIPPED', 'DELIVERED', 'READY_TO_PICKUP', 'PICKED_UP', 'CANCELLED']),
        ];
    }
}
