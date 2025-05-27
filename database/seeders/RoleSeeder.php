<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $data = [[
        //     ['name' => 'admin'],
        //     ['name' => 'manager'],
        //     ['name' => 'worker']
        // ]];
        Role::insert([
            ['name' => 'manager', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'worker', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
