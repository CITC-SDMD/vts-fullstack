<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $user = User::create([
            'agency_id' => 13,
            'firstname' => 'Admin',
            'lastname' => 'Lastname',
            'contact_number' => $faker->phoneNumber(),
            'agency_address' => $faker->address(),
            'email' => 'admin@test.com',
            'password' => Hash::make('123123123'),
        ]);

        $user->assignRole('Administrator');
    }
}
