<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    private $article = 10;
    private $patient = 1;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ReligionSeeder::class,
            CategorySeeder::class,
            EducationSeeder::class,
            RegencySeeder::class,
            PatientStatusSeeder::class,
            DistrictSeeder::class,
            StaticElementSeeder::class,
            SatelliteHealthFacilitySeeder::class,
        ]);

        // Sekawan's TB Jember
        \App\Models\User::factory()->create([
            'name' => 'Sekawans',
            'email' => 'sekawanjember@gmail.com',
            'number' => '081553444245',
            'role' => 'superadmin',
        ]);

        // Divisi Komunikasi
        \App\Models\User::factory()->create([
            'name' => 'Divisi Komunikasi',
            'email' => 'divkom.sekawan@gmail.com',
            'number' => '081553444245',
            'role' => 'admin',
        ]);

        // Divisi IT Database
        \App\Models\User::factory()->create([
            'name' => 'Divisi IT Database',
            'email' => 'itdb.sekawan@gmail.com',
            'number' => '081553444245',
            'role' => 'admin',
        ]);

        // Admin PS
        \App\Models\User::factory()->create([
            'name' => 'Pak Zaini',
            'email' => 'zaini.sekawan@gmail.com',
            'number' => '081553444245',
            'role' => 'adminps',
        ]);

        \App\Models\Article::factory($this->article)->createQuietly();
        \App\Models\EmergencyContact::factory($this->patient)->create();
        \App\Models\Patient::factory($this->patient)->create();
        \App\Models\PatientDetail::factory($this->patient)->create();
    }
}
