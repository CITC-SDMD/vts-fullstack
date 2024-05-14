<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'service_type' => 'Issuance of Barangay protection Order (BPO)',
            ],
            [
                'service_type' => 'Rescue',
            ],
            [
                'service_type' => 'Case conference',
            ],
            [
                'service_type' => 'Issuance of Certificate of Indigency',
            ],
            [
                'service_type' => 'Food Assistance',
            ],
            [
                'service_type' => 'Transportation',
            ],
            [
                'service_type' => 'Case study/home visit',
            ],
            [
                'service_type' => 'Psychiatric evaluation',
            ],
            [
                'service_type' => 'Psychological test',
            ],
            [
                'service_type' => 'Counseling',
            ],
            [
                'service_type' => 'Medical examination',
            ],
            [
                'service_type' => 'Blotter',
            ],
            [
                'service_type' => 'Legal Services',
            ],
            [
                'service_type' => 'Legal Services (affidavit preparation)',
            ],
            [
                'service_type' => 'Temporary Shelter',
            ],
            [
                'service_type' => 'Case Conference',
            ],
            [
                'service_type' => 'Provide Member\'s Personal Profile',
            ],
            [
                'service_type' => 'Received complaints',
            ],
            [
                'service_type' => 'Provide OFW Information Sheet',
            ],
            [
                'service_type' => 'Case Assessment',
            ],
            [
                'service_type' => 'Livelihood Assistance',
            ],
            [
                'service_type' => 'Financial Assistance',
            ],
            [
                'service_type' => 'Capability Building',
            ],
            [
                'service_type' => 'Surveillance and Rescue',
            ],
            [
                'service_type' => 'Pychosocial Support Service',
            ],
            [
                'service_type' => 'Pychological First Aid',
            ],
            [
                'service_type' => 'Non-Food Assistance',
            ],
        ];

        foreach ($services as $service) {
            Service::create([
                'service_type' => $service['service_type'],
            ]);
        }
    }
}
