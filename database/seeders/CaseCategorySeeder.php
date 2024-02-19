<?php

namespace Database\Seeders;

use App\Models\CaseCategory;
use Illuminate\Database\Seeder;

class CaseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cases = [
            [
                'category_name' => 'RA 9262 - Anti-VAWC',
            ],
            [
                'category_name' => 'RA 8353 / RA 11648 - Anti Rape',
            ],
            [
                'category_name' => 'RA 9208 / RA 10358 / RA 11862 – Anti TIP',
            ],
            [
                'category_name' => 'RA 11930 - OSAEC',
            ],
            [
                'category_name' => 'RA 11313 - Safe Spaces Act',
            ],
            [
                'category_name' => 'RA 9710 – Magna Carta of Women',
            ],
            [
                'category_name' => 'RA 7610 – Child Protection Law',
            ],
            [
                'category_name' => 'RA 7877 – Anti-Sexual Harassment',
            ],
            [
                'category_name' => 'RA 11596 - Prohibiting the Practice of Child Marriage',
            ],
            [
                'category_name' => 'Others',
            ],
        ];

        foreach ($cases as $case) {
            CaseCategory::create([
                'category_name' => $case['category_name'],
            ]);
        }
    }
}
