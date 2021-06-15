<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name'              => 'Admin',
            'email'             => 'admin@app.com',
            'password'          => Hash::make(123),
            'remember_token'    => Str::random(10),
            'email_verified_at' => now(),
            'is_admin'          => 1,
        ]);
    }
}
