<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $article = 50;
    private $worker = 50;
    private $satellite = 100;
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
            'number' => '81553444245',
            'role' => 'superadmin',
        ]);

        // Divisi Komunikasi
        \App\Models\User::factory()->create([
            'name' => 'Divisi Komunikasi',
            'email' => 'divkom.sekawan@gmail.com',
            'number' => '81553444245',
            'role' => 'admin',
        ]);

        // Divisi IT Database
        \App\Models\User::factory()->create([
            'name' => 'Divisi IT Database',
            'email' => 'itdb.sekawan@gmail.com',
            'number' => '81553444245',
            'role' => 'admin',
        ]);

        // Admin PS
        \App\Models\User::factory()->create([
            'name' => 'Pak Zaini',
            'email' => 'pakzaini@gmail.com',
            'number' => '8123456789',
            'role' => 'adminps',
        ]);

        \App\Models\Article::factory($this->article)->createQuietly();
        \App\Models\EmergencyContact::factory($this->patient)->create();
        \App\Models\Patient::factory($this->patient)->create();
        \App\Models\PatientDetail::factory($this->patient)->create();
    }
}
