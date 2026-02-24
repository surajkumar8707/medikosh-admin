<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Clear existing records
        Admin::truncate();

        Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => 'password@123',
        ]);
    }
}
