<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voucher::create([
            'code' => 'JULIBERKAH2024',
            'active_at' => fake()->dateTimeBetween(startDate: '+3 days', endDate: '+6 days'),
            'expired_at' => fake()->dateTimeBetween(startDate: '+7 days', endDate: '+2 weeks'),
            'amount' => fake()->numberBetween(1000, 20000),
        ]);
        Voucher::create([
            'code' => 'GAJIAN',
            'active_at' => fake()->dateTimeBetween(startDate: '+3 days', endDate: '+6 days'),
            'expired_at' => fake()->dateTimeBetween(startDate: '+7 days', endDate: '+2 weeks'),
            'amount' => fake()->numberBetween(1000, 20000),
        ]);
        Voucher::create([
            'code' => 'SWEET17',
            'active_at' => fake()->dateTimeBetween(startDate: '+3 days', endDate: '+6 days'),
            'expired_at' => fake()->dateTimeBetween(startDate: '+7 days', endDate: '+2 weeks'),
            'amount' => fake()->numberBetween(1000, 20000),
        ]);
    }
}
