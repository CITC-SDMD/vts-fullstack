<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ServiceSeeder::class,
            BarangaySeeder::class,
            RoleSeeder::class,
            AgencySeeder::class,
            UserSeeder::class,
            // ClientSeeder::class,
            RelationshipSeeder::class,
            CaseCategorySeeder::class,
            AbuseCategorySeeder::class,
            AbuseSubcategorySeeder::class,
        ]);
    }
}
