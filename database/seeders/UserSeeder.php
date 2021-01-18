<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => 'Muhammad Aji Putra',
            'email' => 'muhammad.aji.putra.mp98@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
