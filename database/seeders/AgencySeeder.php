<?php

namespace Database\Seeders;

use App\Models\ReferralAgency;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agencies = [
            [
                'agency_name' => 'Barangay',
            ],
            [
                'agency_name' => 'CSWDO',
            ],
            [
                'agency_name' => 'Sidlakan Crisis Center',
            ],
            [
                'agency_name' => 'IPBM SPMC',
            ],
            [
                'agency_name' => 'WCPU SPMC',
            ],
            [
                'agency_name' => 'WCPD - DCPO',
            ],
            [
                'agency_name' => 'QRTCC / KGH',
            ],
            [
                'agency_name' => 'OWWA',
            ],
            [
                'agency_name' => 'POEA',
            ],
            [
                'agency_name' => 'CPO',
            ],
            [
                'agency_name' => 'CICC',
            ],
            [
                'agency_name' => 'PAO',
            ],
            [
                'agency_name' => 'IGDD – CMO-OSC/PSEAD',
            ],
        ];

        foreach ($agencies as $agency) {
            ReferralAgency::create([
                'agency_name' => $agency['agency_name'],
            ]);
        }
    }
}
