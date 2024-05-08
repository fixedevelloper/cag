<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::factory()->create([
            'first_name' => 'Administrator',
            'email' => 'test@admin.com',
            'phone' => '237675066919',
            'user_type' => 0,
            'unique_number'=>Helper::generatenumber(),
            'password' => bcrypt("123456789"),
        ]);
        User::factory()->create([
            'first_name' => 'Mbah',
            'last_name' => 'Julio',
            'email' => 'driver@gmail.com',
            'phone' => '237675066919',
            'unique_number'=>Helper::generatenumber(),
            'user_type' => 1,
            'password' => bcrypt("123456789"),
        ]);
        User::factory()->create([
            'first_name' => 'Mbah',
            'last_name' => 'Julio',
            'email' => 'customer@gmail.com',
            'phone' => '237675066919',
            'unique_number'=>Helper::generatenumber(),
            'user_type' => 2,
            'password' => bcrypt("123456789"),
        ]);
        $this->call(RegionSeeder::class);
        $this->call(CitySeeder::class);
    }
}
