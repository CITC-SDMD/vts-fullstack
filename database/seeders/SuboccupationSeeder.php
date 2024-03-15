<?php

namespace Database\Seeders;

use App\Models\Suboccupation;
use Illuminate\Database\Seeder;

class SuboccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subs = [
            [
                'occupation_id' => 5,
                'name' => 'PNP',
            ],
            [
                'occupation_id' => 5,
                'name' => 'PHIL. ARMY',
            ],
            [
                'occupation_id' => 5,
                'name' => 'AFP',
            ],
            [
                'occupation_id' => 5,
                'name' => 'RETIREES',
            ],
            [
                'occupation_id' => 5,
                'name' => 'TASK FORCE DVO.',
            ],
            [
                'occupation_id' => 5,
                'name' => 'TMC /CTTMO',
            ],
            [
                'occupation_id' => 5,
                'name' => 'BJMP',
            ],
            [
                'occupation_id' => 5,
                'name' => 'PHIL. NAVY',
            ],
            [
                'occupation_id' => 5,
                'name' => 'PDEA',
            ],
            [
                'occupation_id' => 5,
                'name' => 'PAG',
            ],
            [
                'occupation_id' => 5,
                'name' => 'COAST GUARD',
            ],
            [
                'occupation_id' => 5,
                'name' => 'PHIL. MARINES',
            ],
            [
                'occupation_id' => 5,
                'name' => 'PMA',
            ],
            [
                'occupation_id' => 5,
                'name' => 'NBI',
            ],
            [
                'occupation_id' => 5,
                'name' => 'CIDG',
            ],
            [
                'occupation_id' => 5,
                'name' => 'BFP',
            ],
            [
                'occupation_id' => 5,
                'name' => 'PHIL. AIR FORCE',
            ],
            [
                'occupation_id' => 5,
                'name' => 'PSG-OSAP',
            ],
            [
                'occupation_id' => 5,
                'name' => 'BUREAU OF CUSTOMS',
            ],
            [
                'occupation_id' => 5,
                'name' => 'PSSCC',
            ],
            [
                'occupation_id' => 5,
                'name' => 'POLICE AUXILIARY',
            ],
            [
                'occupation_id' => 5,
                'name' => 'HIGHWAY PATROL GROUP',
            ],
        ];

        foreach ($subs as $sub) {
            Suboccupation::create([
                'occupation_id' => $sub['occupation_id'],
                'name' => $sub['name'],
            ]);
        }
    }
}
