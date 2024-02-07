<?php

namespace Database\Seeders;

use App\Models\AbuseSubcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'type' => 'Medical Certificate'
            ],
            [
                'abuse_category_id' => 1,
                'type' => 'BPO'
            ],
            [
                'abuse_category_id' => 1,
                'type' => 'Medical Certificate'
            ],
            [
                'abuse_category_id' => 1,
                'type' => 'Police Blotter'
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'No Support'
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'Irregular & Insufficient Support'
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'Deprivation of Properties'
            ],
            [
                'abuse_category_id' => 2,
                'type' => 'Not allowed to work/profession'
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Marital Infidelity'
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Verbal Abuse'
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Threat'
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Public Humiliation'
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Damage of Property'
            ],
            [
                'abuse_category_id' => 3,
                'type' => 'Stalking'
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
