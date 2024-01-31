<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = [
            [
                'agency_id' => 1,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'barangay@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 2,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'cswdo@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 3,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'sidlakan@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 4,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'ipbm@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 5,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'wcpu@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 6,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'wcpd@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 7,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'qrtcc@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 8,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'owwa@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 9,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'poea@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 10,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'cpo@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 11,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'cicc@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 12,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'pao@test.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 13,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'contact_number' => $faker->phoneNumber(),
                'agency_address' => $faker->address(),
                'email' => 'igdd@test.com',
                'password' => 'password',
            ],
        ];

        foreach ($users as $user) {
            $newUser = User::create([
                'agency_id' => $user['agency_id'],
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'contact_number' => $user['contact_number'],
                'agency_address' => $user['agency_address'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);

            $newUser->assignRole('Administrator');
        }
    }
}
