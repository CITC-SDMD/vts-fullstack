<?php

namespace Database\Seeders;

use App\Models\Relationship;
use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'relationship_type' => 'Brother',
            ],
            [
                'relationship_type' => 'Sister',
            ],
            [
                'relationship_type' => 'Father',
            ],
            [
                'relationship_type' => 'Mother',
            ],
            [
                'relationship_type' => 'Grandfather',
            ],
            [
                'relationship_type' => 'Grandmother',
            ],
            [
                'relationship_type' => 'Uncle',
            ],
            [
                'relationship_type' => 'Aunt',
            ],
            [
                'relationship_type' => 'Cousin',
            ],
            [
                'relationship_type' => 'Nephew',
            ],
            [
                'relationship_type' => 'Niece',
            ],
            [
                'relationship_type' => 'Husband',
            ],
            [
                'relationship_type' => 'Wife',
            ],
            [
                'relationship_type' => 'Son',
            ],
            [
                'relationship_type' => 'Daughter',
            ],
            [
                'relationship_type' => 'Grandson',
            ],
            [
                'relationship_type' => 'Granddaughter',
            ],
            [
                'relationship_type' => 'Father-in-law',
            ],
            [
                'relationship_type' => 'Mother-in-law',
            ],
            [
                'relationship_type' => 'Brother-in-law',
            ],
            [
                'relationship_type' => 'Sister-in-law',
            ],
            [
                'relationship_type' => 'Son-in-law',
            ],
            [
                'relationship_type' => 'Daughter-in-law',
            ],
            [
                'relationship_type' => 'Stepfather',
            ],
            [
                'relationship_type' => 'Stepmother',
            ],
            [
                'relationship_type' => 'Stepbrother',
            ],
            [
                'relationship_type' => 'Stepsister',
            ],
            [
                'relationship_type' => 'Half-brother',
            ],
            [
                'relationship_type' => 'Half-sister',
            ],
            [
                'relationship_type' => 'Fiancé/Fiancée',
            ],
            [
                'relationship_type' => 'Live-in Partner',
            ],
            [
                'relationship_type' => 'Stranger',
            ],
            [
                'relationship_type' => 'Sexual Relation',
            ],
            [
                'relationship_type' => 'Schoolmate',
            ],
            [
                'relationship_type' => 'Neighbor',
            ],
            [
                'relationship_type' => 'Landlord',
            ],
            [
                'relationship_type' => 'Godparent',
            ],
            [
                'relationship_type' => 'Friend',
            ],
            [
                'relationship_type' => 'Former Spouse',
            ],
            [
                'relationship_type' => 'Former Boyfriend',
            ],
            [
                'relationship_type' => 'Former Live-in Partner',
            ],
            [
                'relationship_type' => 'Employer',
            ],
            [
                'relationship_type' => 'Co-Employee',
            ],
            [
                'relationship_type' => 'Boyfriend',
            ],
            [
                'relationship_type' => 'Acquaintance',
            ],
        ];

        foreach ($types as $type) {
            Relationship::create([
                'relationship_type' => $type['relationship_type'],
            ]);
        }
    }
}
