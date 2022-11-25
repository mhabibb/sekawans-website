<?php

namespace Database\Seeders;

use App\Models\StaticElement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaticElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StaticElement::create([
            'element' => 'profil',
            'contents' => fake()->realText(300),
        ]);

        StaticElement::create([
            'element' => 'visimisi',
            'contents' => fake()->realText(500),
        ]);

        StaticElement::create([
            'element' => 'struktur',
            'contents' => fake()->imageUrl(1080, 720),
        ]);

        StaticElement::create([
            'element' => 'whatsapp',
            'contents' => fake()->phoneNumber(),
        ]);

        StaticElement::create([
            'element' => 'instagram',
            'contents' => 'https://www.instagram.com/sekawanstbc_jember/',
        ]);

        StaticElement::create([
            'element' => 'tiktok',
            'contents' => 'https://www.tiktok.com/@sekawanstbc_jember',
        ]);

        StaticElement::create([
            'element' => 'youtube',
            'contents' => 'https://www.youtube.com/@sekawanstb5619',
        ]);
    }
}
