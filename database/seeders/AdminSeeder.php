<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'dpjb@hotmail.fr',
            'name' => 'Administrator',
            'password' => Hash::make('demo'),
            'role' => User::ADMIN_ROLE,
        ]);
    }
}