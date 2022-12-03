<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $user = 10;
    private $article = 200;
    private $worker = 50;
    private $satelite = 100;
    private $patient = 150;

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
            'name' => 'Compek',
            'email' => 'compek@dr.com',
            'password' => bcrypt('compekiah'),
            'role' => true,
        ]);
        
        \App\Models\User::factory($this->user--)->create();
        \App\Models\Article::factory($this->article)->createQuietly();
        \App\Models\EmergencyContact::factory($this->patient)->create();
        \App\Models\Patient::factory($this->patient)->create();
        \App\Models\Worker::factory($this->worker)->create();
        \App\Models\SateliteHealthFacility::factory($this->satelite)->create();
        \App\Models\PatientDetail::factory($this->patient)->create();
    }
}
