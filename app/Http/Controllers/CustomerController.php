<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        // Records transcribed from the previous POS screenshot for TFA5.
        // Names and emails are preserved; phone numbers and dates are examples.
        // Masked phone numbers are placeholders. Listing row numbers are not IDs.
        $customers = [
            ['full_name' => 'Ada Mesmer', 'email' => 'psychiatrist@gmail.com', 'phone' => '09XX-XXX-1001', 'created_at' => '2026-10-01 09:00:00'],
            ['full_name' => 'Frederick Kreiburg', 'email' => 'composer@gmail.com', 'phone' => '09XX-XXX-1002', 'created_at' => '2026-10-02 10:15:00'],
            ['full_name' => 'Richard Sterling', 'email' => 'knight@gmail.com', 'phone' => '09XX-XXX-1003', 'created_at' => '2026-10-03 11:30:00'],
            ['full_name' => 'Evelyn Mora', 'email' => 'farolady@gmail.com', 'phone' => '09XX-XXX-1004', 'created_at' => '2026-10-04 13:00:00'],
            ['full_name' => 'Emil Mesmer', 'email' => 'patient@gmail.com', 'phone' => '09XX-XXX-1005', 'created_at' => '2026-10-05 14:20:00'],
            ['full_name' => 'Lars Alexandersson', 'email' => 'dorya@hotmail.com', 'phone' => '09XX-XXX-1006', 'created_at' => '2026-10-06 15:45:00'],
            ['full_name' => 'Tracy Reznik', 'email' => 'mechanic@gmail.com', 'phone' => '09XX-XXX-1007', 'created_at' => '2026-10-07 16:10:00'],
        ];

        return view('customers.index', ['customers' => $customers]);
    }
}
