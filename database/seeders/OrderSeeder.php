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
        Order::factory()->count(10)->create();

        Order::all()->each(function ($order) {
            OrderItem::factory()->count(2)->create([
                'order_id' => $order->id,
            ]);
            $order->update([
                'total_price' => $order->order_items->sum('price'),
            ]);
        });
    }
}
