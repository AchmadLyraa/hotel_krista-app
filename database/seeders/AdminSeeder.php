<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'nama'     => 'Administrator',
            'username'    => 'Admin',
            'role'    => 'admin',
            'password' => bcrypt('1234'),
        ]);

        Admin::create([
            'nama'     => 'Receptionist',
            'username'    => 'Receptionist',
            'role'    => 'receptionist',
            'password' => bcrypt('1234'),
        ]);

        Admin::create([
            'nama'     => 'Vadasskudy',
            'username'    => 'Vadas',
            'role'    => 'receptionist',
            'password' => bcrypt('1234'),
        ]);
    }
}
