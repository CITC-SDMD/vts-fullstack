<?php

namespace Database\Seeders;

use App\Models\Barangay;
use App\Models\Client;
use Carbon\Carbon;
use DateTime;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maxBirthYear = 2000;

        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {

            $year = 2024;
            $randomDay = rand(1, 31);
            $randomMonth = rand(1, 12);
            $randomYear = $year;
            $randomDate = new DateTime("$randomYear-$randomMonth-$randomDay");
            $formattedRandomDate = $randomDate->format('Y-m-d');

            $randomBirthdate = $faker->dateTimeBetween('-' . $maxBirthYear . ' years', '-18 years');
            $formattedBirthdate = Carbon::parse($randomBirthdate)->format('Y-m-d');
            $currentAge = Carbon::parse($formattedBirthdate)->diffInYears();
            $barangay = Barangay::inRandomOrder()->first();

            $occupation = $faker->randomElement(['Government', 'Private', 'Self-employed', 'Retired-employed', 'OFW']);

            Client::create([
                'barangay_id' => $barangay->id,
                'firstname' => $faker->firstName(),
                'middlename' => $faker->lastName(),
                'lastname' => $faker->lastName(),
                'contact_no' => $faker->phoneNumber(),
                'birthdate' => $formattedBirthdate,
                'sex' => $faker->randomElement(['male', 'female']),
                'age' => $currentAge,
                'civil_status' => $faker->randomElement(['single', 'married', 'widowed', 'divorced']),
                'educ_attain' => $faker->word(),
                'home_address' => $faker->streetAddress(),
                'work_address' => $faker->address(),
                'occupation' => $occupation,
                'other_occupation' => ($occupation == 'Government' || $occupation == 'OFW') ? $faker->jobTitle() : null,
                'ethnicity' => $faker->randomElement(['non-ip', 'ip', 'muslim']),
                'is_4ps_beneficiary' => $faker->randomElement([true, false]),
                'created_at' => $formattedRandomDate,
            ]);
        }
    }
}
