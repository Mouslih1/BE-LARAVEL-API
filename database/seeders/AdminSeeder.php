<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create($this->adminData());
    }

    private function adminData()
    {
        return [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin2023'),
            'email_verified_at' => Carbon::now()
        ];
    }
}
