<?php

namespace Database\Seeders;

use App\Models\AbuseCategory;
use Illuminate\Database\Seeder;

class AbuseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abuseCategories = [
            [
                'case_category_id' => 1,
                'abuse_type' => 'Physical',
            ],
            [
                'case_category_id' => 1,
                'abuse_type' => 'Economic',
            ],
            [
                'case_category_id' => 1,
                'abuse_type' => 'Psychological/Emotional',
            ],
            [
                'case_category_id' => 1,
                'abuse_type' => 'Sexual',
            ],
            [
                'case_category_id' => 1,
                'abuse_type' => 'Others',
            ],
        ];

        foreach ($abuseCategories as $abuseCategory) {
            AbuseCategory::create([
                'case_category_id' => $abuseCategory['case_category_id'],
                'abuse_type' => $abuseCategory['abuse_type'],
            ]);
        }
    }
}
