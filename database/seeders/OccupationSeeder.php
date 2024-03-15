<?php

namespace Database\Seeders;

use App\Models\Occupation;
use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $occupations = [
            [
                'name' => 'Unemployed',
            ],
            [
                'name' => 'Student',
            ],
            [
                'name' => 'Self-employed',
            ],
            [
                'name' => 'Private employee',
            ],
            [
                'name' => 'Government employee',
            ],
            [
                'name' => 'OFW',
            ],
            [
                'name' => 'Retired employee',
            ],
            [
                'name' => 'Pensioner',
            ],
        ];

        foreach ($occupations as $occupation) {
            Occupation::create([
                'name' => $occupation['name'],
            ]);
        }
    }
}
