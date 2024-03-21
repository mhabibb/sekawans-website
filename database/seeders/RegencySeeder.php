<?php

namespace Database\Seeders;

use App\Models\Regency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regency::create([
            'id' => '3508',
            'name' => 'KABUPATEN LUMAJANG',
        ]);
        Regency::create([
            'id' => '3509',
            'name' => 'KABUPATEN JEMBER',
        ]);
        Regency::create([
            'id' => '3511',
            'name' => 'KABUPATEN BONDOWOSO',
        ]);
        Regency::create([
            'id' => '3512',
            'name' => 'KABUPATEN SITUBONDO',
        ]);
    }
}
