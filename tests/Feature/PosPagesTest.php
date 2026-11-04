<?php

namespace Tests\Feature;

use Tests\TestCase;

class PosPagesTest extends TestCase
{
    public function test_every_page_loads_and_links_to_all_four_pages(): void
    {
        $pages = [
            '/' => 'Stay sharp.',
            '/about' => 'Built for your crew.',
            '/customers' => 'Customer Accounts',
            '/users' => 'User Accounts',
        ];

        foreach ($pages as $path => $heading) {
            $response = $this->get($path);
            $response->assertOk()->assertSee($heading)->assertSee('Sharkbyte POS');

            foreach (['home', 'about', 'customers.index', 'users.index'] as $name) {
                $response->assertSee('href="'.route($name).'"', false);
            }
        }
    }

    public function test_customer_records_are_passed_to_the_view_and_rendered(): void
    {
        $response = $this->get('/customers');

        $response->assertOk()
            ->assertViewIs('customers.index')
            ->assertViewHas('customers', fn (array $customers): bool => count($customers) === 7)
            ->assertSee('Phone number')
            ->assertSee('Date created')
            ->assertSee('09XX-XXX-1001')
            ->assertSee('09XX-XXX-1007')
            ->assertSee('Oct 01, 2026')
            ->assertSee('Oct 07, 2026');

        foreach ([
            'Ada Mesmer' => 'psychiatrist@gmail.com',
            'Frederick Kreiburg' => 'composer@gmail.com',
            'Richard Sterling' => 'knight@gmail.com',
            'Evelyn Mora' => 'farolady@gmail.com',
            'Emil Mesmer' => 'patient@gmail.com',
            'Lars Alexandersson' => 'dorya@hotmail.com',
            'Tracy Reznik' => 'mechanic@gmail.com',
        ] as $name => $email) {
            $response->assertSee($name)->assertSee($email);
        }

        $this->assertSame(7, substr_count($response->getContent(), 'data-record="customer"'));
    }

    public function test_user_records_are_passed_to_the_view_and_rendered(): void
    {
        $response = $this->get('/users');

        $response->assertOk()
            ->assertViewIs('users.index')
            ->assertViewHas('users', fn (array $users): bool => count($users) === 6)
            ->assertSee('Date created')
            ->assertSee('Sep 15, 2026')
            ->assertSee('Sep 20, 2026');

        foreach ([
            'admin01' => 'Gabriel Saulo',
            'cashier01' => 'Gigi Murin',
            'staff01' => 'Cecilia Immergreen',
            'cashier02' => 'Raora Panthera',
            'manager01' => 'Elizabeth Rose Bloodflame',
            'Co-Manager' => 'Nerissa Ravencroft',
        ] as $username => $name) {
            $response->assertSee($username)->assertSee($name);
        }

        $this->assertSame(6, substr_count($response->getContent(), 'data-record="user"'));
    }

    public function test_listings_do_not_require_a_database_connection(): void
    {
        config([
            'database.default' => 'intentionally_unavailable',
            'session.driver' => 'array',
            'cache.default' => 'array',
        ]);

        $this->get('/customers')->assertOk();
        $this->get('/users')->assertOk();
    }
}
