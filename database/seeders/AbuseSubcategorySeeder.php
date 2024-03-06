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
                'type' => 'Physical Harm',
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'Withdraw Support',
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'Prevent to Work',
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'Deprive Support',
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'Control Money',
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'Insufficient Support',
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
                'abuse_category_id' => 3,
                'type' => 'Stalking',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Property Damage',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Humiliation',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Verbal Abuse',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Infidelity',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Witness Abuse',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Pornography',
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Deprivation of Custody',
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
                'type' => 'Sexual Remarks',
            ],
            [
                'abuse_category_id' => 4,
                'type' => 'Watch Obscene',
            ],
            [
                'abuse_category_id' => 4,
                'type' => 'Indescent Acts',
            ],
            [
                'abuse_category_id' => 4,
                'type' => 'Wife & Mistress Sleep Together',
            ],
            [
                'abuse_category_id' => 4,
                'type' => 'Sexual Activity',
            ],
            [
                'abuse_category_id' => 4,
                'type' => 'Prostituting',
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
