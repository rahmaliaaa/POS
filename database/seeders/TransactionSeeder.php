<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah ada user di database, kalau belum buat satu
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        Transaction::create([
            'user_id' => $user->id, // Menggunakan user pertama di database
            'total_price' => 25500000,
        ]);
    }
}