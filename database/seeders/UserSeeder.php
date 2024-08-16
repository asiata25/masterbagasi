<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->hasCart()->create([
            'username' => 'masterbagasi01',
            'name' => 'masterbagasi',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        User::factory()->hasCart()->create([
            'username' => 'masterbagasi.Dua',
            'name' => 'masterbagasi dua',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);
    }
}
