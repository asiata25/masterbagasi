<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProductSeeder::class,
        ]);

        $products = Product::all();

        User::factory(5)->create()->each(function ($user) use ($products) {
            $cart = Cart::factory()->create([
                'user_id' => $user->id
            ]);

            // Randomize the number of cart items (1-5 items per cart)
            $cartItemsCount = rand(1, 5);
            $productIds = [];

            for ($i = 0; $i < $cartItemsCount; $i++) {
                // Pick a random product
                do {
                    $product = $products->random();
                } while (in_array($product->id, $productIds)); // Continue looping until a unique product ID is found

                $productIds[] = $product->id;

                // Create a cart item with a random quantity
                CartItem::factory()->create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                ]);
            }
        });
    }
}
