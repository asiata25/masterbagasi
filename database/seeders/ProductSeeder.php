<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'shampo sunsilk',
            'price' => 9500,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'sabun lifebuoy',
            'price' => 6500,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'minyak goreng bimoli',
            'price' => 28500,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'mie goreng indomie',
            'price' => 2500,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'kopi kapal api',
            'price' => 18000,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'teh sariwangi',
            'price' => 12000,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'susu dancow',
            'price' => 32000,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'kecap bango',
            'price' => 14500,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'biskuit roma kelapa',
            'price' => 8000,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'roti sari roti',
            'price' => 8500,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'minuman pocari sweat',
            'price' => 7000,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'cokelat silverqueen',
            'price' => 16000,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'tisu paseo',
            'price' => 12000,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'air mineral aqua',
            'price' => 5000,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);

        Product::create([
            'name' => 'sikat gigi formula',
            'price' => 4500,
            'created_at' => Carbon::now()->subDays(rand(0, 7)),
        ]);
    }
}
