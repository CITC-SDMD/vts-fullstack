<?php

namespace Database\Seeders;

use App\Models\Suboccupation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdditionalSubOccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adds = [
            [
                'occupation_id' => 5,
                'name' => 'National Government Employee',
            ],
            [
                'occupation_id' => 5,
                'name' => 'Local Government Employee',
            ],
        ];

        foreach($adds as $add){
            Suboccupation::create([
                'occupation_id' => $add['occupation_id'],
                'name' => $add['name'],
            ]);
        }
    }
}
