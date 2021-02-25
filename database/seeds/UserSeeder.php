<?php

use Illuminate\Database\Seeder;
use App\User;
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
        User::create([
            'name' => 'instruktur',
            'email' => 'instruktur@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 'instruktur'
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 'siswa'
        ]);
    }
}
