<?php

namespace Database\Seeders;

use App\Models\CaseCategory;
use App\Models\CaseProfile;
use App\Models\Client;
use App\Models\Relationship;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CaseProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = Client::all();
        $caseCategories = CaseCategory::whereNotIn('id', [1, 10])->pluck('id');
        $relationships = Relationship::all()->pluck('id');

        $faker = Faker::create();

        foreach ($clients as $client) {

            $year = 2024;
            $randomDay = rand(1, 31);
            $randomMonth = rand(1, 12);
            $randomYear = $year;
            $randomDate = new DateTime("$randomYear-$randomMonth-$randomDay");
            $formattedRandomDate = $randomDate->format('Y-m-d');

            $currentTimestamp = now();
            $year = $currentTimestamp->year;
            $month = $currentTimestamp->month;
            $day = $currentTimestamp->day;
            $millisecond = $currentTimestamp->millisecond;
            $caseNumber = $year . $month . $day . $millisecond;

            $respondent = Client::where('id', '!=', $client->id)->inRandomOrder()->first();

            CaseProfile::create([
                'case_category_id' => $faker->randomElement($caseCategories),
                'complainant_id' => $client->id,
                'respondent_id' => $respondent->id,
                'received_by_id' => 1,
                'relationship_id' => $faker->randomElement($relationships),
                'case_profile_id' => 'CASE #' . $caseNumber,
                'created_at' => $formattedRandomDate
            ]);
        }
    }
}
