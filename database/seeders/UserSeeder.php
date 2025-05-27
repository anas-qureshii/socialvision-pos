<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'zain ul abideen',
            'email' => 'zainabd31@gmail.com',
            'role' => 1,
            'password' => 'zain123@#'
        ]);

    }
}
