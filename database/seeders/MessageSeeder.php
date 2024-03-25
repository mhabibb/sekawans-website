<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'nama' => 'Muhammad Habibulloh',
            'no_wa' => '6281553444245'
        ]);

        Message::create([
            'nama' => 'Dohan Hadityo',
            'no_wa' => '6281230090673'
        ]);

        Message::create([
            'nama' => 'Kak Zulfaida',
            'no_wa' => '6287712758168'
        ]);

        Message::create([
            'nama' => 'Mas Haikal BCF',
            'no_wa' => '6289626750089'
        ]);

        Message::create([
            'nama' => 'Alya Mirza',
            'no_wa' => '6281615974719'
        ]);

        Message::create([
            'nama' => 'Silvi Maulani',
            'no_wa' => '6288226108503'
        ]);

        Message::create([
            'nama' => 'Khoriunnisa',
            'no_wa' => '6282139608011'
        ]);

    }
}
