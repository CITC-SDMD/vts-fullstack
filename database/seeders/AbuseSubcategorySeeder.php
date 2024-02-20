<?php

namespace Database\Seeders;

use App\Models\AbuseSubcategory;
use Illuminate\Database\Seeder;

class AbuseSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            [
                'abuse_category_id' => 1,
                'type' => 'Bodily or Physical harm',
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'No Support',
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'Irregular & Insufficient Support',
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'Deprivation of Properties',
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'Not allowed to work/profession',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Marital Infidelity',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Verbal Abuse',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Threat',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Public Humiliation',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Damage of Property',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Stalking',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Intimidation',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Harassment',
            ],
            [
                'abuse_category_id' => 4,
                'type' => 'Rape',
            ],
            [
                'abuse_category_id' => 4,
                'type' => 'Sexual Harassment',
            ],
            [
                'abuse_category_id' => 4,
                'type' => 'Acts of Lasciviousness',
            ],
            [
                'abuse_category_id' => 4,
                'type' => 'Demeaning and Sexually Gestures',
            ],
            [
                'abuse_category_id' => 4,
                'type' => 'Prostituting Woman or Child',
            ],
        ];

        foreach ($subCategories as $subCategory) {
            AbuseSubcategory::create([
                'abuse_category_id' => $subCategory['abuse_category_id'],
                'type' => $subCategory['type'],
            ]);
        }
    }
}
