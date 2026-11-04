<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PosDemoSeeder extends Seeder
{
    public function run(): void
    {
        // Optional database demonstration for the submission requirement.
        // The page controllers intentionally continue to use their own arrays.
        $customers = [
            ['name' => 'Ana Reyes', 'email' => 'ana@example.test', 'phone' => 'DEMO-001', 'balance' => 1250.00, 'status' => 'Active'],
            ['name' => 'Marco Santos', 'email' => 'marco@example.test', 'phone' => 'DEMO-002', 'balance' => 0.00, 'status' => 'Active'],
            ['name' => 'Lea Cruz', 'email' => 'lea@example.test', 'phone' => 'DEMO-003', 'balance' => 480.50, 'status' => 'Active'],
            ['name' => 'Paolo Garcia', 'email' => 'paolo@example.test', 'phone' => 'DEMO-004', 'balance' => 0.00, 'status' => 'Inactive'],
            ['name' => 'Mia Flores', 'email' => 'mia@example.test', 'phone' => 'DEMO-005', 'balance' => 320.00, 'status' => 'Active'],
        ];

        $users = [
            ['name' => 'Alex Rivera', 'email' => 'alex@example.test', 'role' => 'Administrator', 'status' => 'Active'],
            ['name' => 'Bea Mendoza', 'email' => 'bea@example.test', 'role' => 'Manager', 'status' => 'Active'],
            ['name' => 'Carlo Ramos', 'email' => 'carlo@example.test', 'role' => 'Cashier', 'status' => 'Active'],
            ['name' => 'Dina Lopez', 'email' => 'dina@example.test', 'role' => 'Cashier', 'status' => 'Active'],
            ['name' => 'Eli Torres', 'email' => 'eli@example.test', 'role' => 'Inventory Staff', 'status' => 'Inactive'],
        ];

        $now = now();

        DB::transaction(function () use ($customers, $users, $now): void {
            foreach ($customers as $customer) {
                DB::table('customers')->updateOrInsert(
                    ['email' => $customer['email']],
                    array_merge($customer, ['created_at' => $now, 'updated_at' => $now]),
                );
            }

            foreach ($users as $user) {
                DB::table('users')->updateOrInsert(
                    ['email' => $user['email']],
                    array_merge($user, [
                        // No shared demo password: this exercise has no login.
                        'password' => Hash::make(Str::random(40)),
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]),
                );
            }
        });
    }
}
