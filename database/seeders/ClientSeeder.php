<?php

namespace Database\Seeders;

use App\Models\Barangay;
use App\Models\Client;
use App\Models\Occupation;
use App\Models\Suboccupation;
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

        $occupation = Occupation::all()->pluck('id');
        $suboccupation = Suboccupation::all()->pluck('id');

        for ($i = 0; $i < 100; $i++) {

            $year = 2024;
            $randomDay = rand(1, 31);
            $randomMonth = rand(1, 12);
            $randomYear = $year;
            $randomDate = new DateTime("$randomYear-$randomMonth-$randomDay");
            $formattedRandomDate = $randomDate->format('Y-m-d');

            $randomBirthdate = $faker->dateTimeBetween('-'.$maxBirthYear.' years', '-18 years');
            $formattedBirthdate = Carbon::parse($randomBirthdate)->format('Y-m-d');
            $currentAge = Carbon::parse($formattedBirthdate)->diffInYears();
            $barangay = Barangay::inRandomOrder()->first();

            $work = $faker->randomElement($occupation);

            $age = $faker->numberBetween(14, 35);

            Client::create([
                'barangay_id' => $barangay->id,
                'firstname' => $faker->firstName(),
                'middlename' => $faker->lastName(),
                'lastname' => $faker->lastName(),
                'contact_no' => $faker->phoneNumber(),
                // 'birthdate' => $formattedBirthdate,
                // 'sex' => $faker->randomElement(['male', 'female']),
                'sex' => 'female',
                'age' => $age,
                'civil_status' => $faker->randomElement(['single', 'married', 'widowed', 'divorced']),
                'educ_attain' => $faker->word(),
                'home_address' => $faker->streetAddress(),
                'work_address' => $faker->address(),
                'occupation_id' => $work,
                'suboccupation_id' => ($work == 5 && $age > 17) ? $faker->randomElement($suboccupation) : null,
                'ethnicity' => $faker->randomElement(['non-ip', 'ip', 'muslim']),
                'is_4ps_beneficiary' => $faker->randomElement([true, false]),
                'created_at' => $formattedRandomDate,
            ]);
        }
    }
}
