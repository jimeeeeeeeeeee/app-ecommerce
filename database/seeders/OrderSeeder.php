<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();

        if ($users->count() === 0 || $products->count() === 0) {
            $this->command->info('No hay usuarios o productos. Por favor, ejecuta esos seeders primero.');
            return;
        }

        $randomUsers = $users->random(1);

        foreach ($randomUsers as $user) {
            $order = Order::create([
                'user_id' => $user->id,
                'total' => 0, 
                'status' => 'paid',
            ]);

            $orderTotal = 0;

            $randomProducts = $products->random(rand(1, 3));

            foreach ($randomProducts as $product) {
                $quantity = rand(1, 4);
                $price = $product->precio;

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);

                $orderTotal += ($quantity * $price);
            }

            $order->update(['total' => $orderTotal]);
        }
    }
}