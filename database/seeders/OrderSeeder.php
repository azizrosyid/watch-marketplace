<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::factory()->count(200)->create();

        $orders->each(function ($order) {
            OrderItem::factory()->count(
                random_int(1, 5)
            )->create([
                'order_id' => $order->id,
            ]);
            $order->update([
                'total_price' => $order->order_items->sum('price'),
            ]);
        });
    }
}
