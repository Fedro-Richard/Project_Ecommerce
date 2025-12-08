<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have at least one user to attach transactions to (optional)
        $user = User::first();
        
        $transactions = [
            [
                'user_id' => $user->id ?? 1,
                'item_name' => 'Tim ORIGINAL',
                'item_image' => 'images/florenoria.png',
                'qty' => 2,
                'total_price' => 30000,
                'customer_name' => 'Alice Baker',
                'customer_address' => '123 Cookie Lane',
                'customer_phone' => '081234567890',
                'payment_method' => 'COD',
                'status' => 'pending',
                'created_at' => now()->subHours(2),
            ],
            [
                'user_id' => $user->id ?? 1,
                'item_name' => 'Tim COKLAT',
                'item_image' => 'images/florenoria.png',
                'qty' => 1,
                'total_price' => 15000,
                'customer_name' => 'Bob Miller',
                'customer_address' => '456 Pastry Road',
                'customer_phone' => '089876543210',
                'payment_method' => 'TRANSFER',
                'status' => 'paid',
                'created_at' => now()->subDay(),
            ],
            [
                'user_id' => $user->id ?? 1,
                'item_name' => 'Assorted Box',
                'item_image' => 'images/florenoria.png',
                'qty' => 3,
                'total_price' => 45000,
                'customer_name' => 'Charlie Chef',
                'customer_address' => '789 Dough Street',
                'customer_phone' => '085555555555',
                'payment_method' => 'COD',
                'status' => 'shipped',
                'created_at' => now()->subDays(2),
            ],
            [
                'user_id' => $user->id ?? 1,
                'item_name' => 'Tim ORIGINAL',
                'item_image' => 'images/florenoria.png',
                'qty' => 5,
                'total_price' => 75000,
                'customer_name' => 'Diana Dessert',
                'customer_address' => '321 Sugar Avenue',
                'customer_phone' => '087777777777',
                'payment_method' => 'TRANSFER',
                'status' => 'done',
                'created_at' => now()->subDays(5),
            ],
        ];

        foreach ($transactions as $data) {
            Transaction::create($data);
        }
        
        $this->command->info('Dummy transactions seeded.');
    }
}
