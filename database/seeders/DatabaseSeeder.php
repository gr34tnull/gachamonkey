<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SUPER ADMIN',
            'email' => 'gr34tnull@gmail.com',
            'password' => Hash::make('Zxasqw12'),
        ]);

        User::create([
            'name' => 'ADMIN',
            'email' => 'admin@icreate.live',
            'password' => Hash::make('Zxasqw12'),
        ]);
    }
}
