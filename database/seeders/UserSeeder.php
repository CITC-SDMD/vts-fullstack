<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'agency_id' => 13,
                'firstname' => 'Joseph Vincent',
                'lastname' => 'Limbaroc',
                'telephone_number' => 'N/A',
                'mobile_number' => '+639171320414',
                'agency_address' => 'CITC-SDMD',
                'email' => 'jvlimbaroc@gmail.com',
                'password' => 'password',
            ],
            [
                'agency_id' => 13,
                'firstname' => 'Frex',
                'lastname' => 'Walter',
                'telephone_number' => 'N/A',
                'mobile_number' => 'N/A',
                'agency_address' => 'N/A',
                'email' => 'frexwalter1085@yahoo.com',
                'password' => 'password',
            ],
        ];

        foreach ($users as $user) {
            $newUser = User::create([
                'agency_id' => $user['agency_id'],
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'telephone_number' => $user['telephone_number'],
                'mobile_number' => $user['mobile_number'],
                'agency_address' => $user['agency_address'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);

            $newUser->assignRole('Administrator');
        }
    }
}
