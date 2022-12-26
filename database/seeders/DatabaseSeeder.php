<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // private $user = 10;
    private $article = 50;
    private $worker = 50;
    private $satellite = 100;
    private $patient = 200;

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
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Sekawans',
            'email' => 'sekawanjember@gmail.com',
            'role' => true,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Divisi Komunikasi',
            'email' => 'divkom.sekawan@gmail.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Divisi IT Database',
            'email' => 'itdb.sekawan@gmail.com',
        ]);
        
        // \App\Models\User::factory($this->user--)->create();
        \App\Models\Article::factory($this->article)->createQuietly();
        \App\Models\EmergencyContact::factory($this->patient)->create();
        \App\Models\Patient::factory($this->patient)->create();
        \App\Models\Worker::factory($this->worker)->create();
        \App\Models\SatelliteHealthFacility::factory($this->satellite)->create();
        \App\Models\PatientDetail::factory($this->patient)->create();
    }
}
