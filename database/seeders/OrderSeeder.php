<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::factory(50)->create()->each(function ($order) {

            $details = OrderDetail::factory(rand(1, 4))->create([
                'order_id' => $order->id
            ]);

            $realTotal = $details->sum(function ($detail) {
            return $detail->quantity * $detail->price;
            });

            $order->update(['total' => $realTotal]);
        });
    }
}