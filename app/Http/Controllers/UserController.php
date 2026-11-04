<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        // Preserve the IDs, usernames, and full names from the previous POS.
        // Creation dates are example values for this static-data exercise.
        $users = [
            ['id' => 1, 'username' => 'admin01', 'full_name' => 'Gabriel Saulo', 'created_at' => '2026-09-15 08:00:00'],
            ['id' => 2, 'username' => 'cashier01', 'full_name' => 'Gigi Murin', 'created_at' => '2026-09-16 09:15:00'],
            ['id' => 3, 'username' => 'staff01', 'full_name' => 'Cecilia Immergreen', 'created_at' => '2026-09-17 10:30:00'],
            ['id' => 4, 'username' => 'cashier02', 'full_name' => 'Raora Panthera', 'created_at' => '2026-09-18 11:45:00'],
            ['id' => 5, 'username' => 'manager01', 'full_name' => 'Elizabeth Rose Bloodflame', 'created_at' => '2026-09-19 13:00:00'],
            ['id' => 6, 'username' => 'Co-Manager', 'full_name' => 'Nerissa Ravencroft', 'created_at' => '2026-09-20 14:15:00'],
        ];

        return view('users.index', ['users' => $users]);
    }
}
