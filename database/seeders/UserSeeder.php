<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Seller',
            'username' => 'seller',
            'email' => 'seller@gmail.com',
            'role' => 'seller',
        ]);

        User::factory()->create([
            'name' => 'Customer',
            'username' => 'customer',
            'email' => 'customer@gmail.com',
            'role' => 'customer',
        ]);

        User::factory()->times(10)->create([
            'role' => 'customer'
        ]);
    }
}
