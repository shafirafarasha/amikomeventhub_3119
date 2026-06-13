<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin
        \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Kategori
        $seminar = \App\Models\Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);

        $entertainment = \App\Models\Category::create([
            'name' => 'Entertainment',
            'slug' => 'entertainment',
        ]);

        $competition = \App\Models\Category::create([
            'name' => 'Competition',
            'slug' => 'competition',
        ]);

        // 3. Events

        // --- Entertainment ---
        \App\Models\Event::create([
            'category_id' => $entertainment->id,
            'title' => 'Jazz Night 2026',
            'description' => 'Nikmati malam santai dengan musik jazz live.',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Hall',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-1.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $entertainment->id,
            'title' => 'E-Sport U-Champ',
            'description' => 'Turnamen game antar mahasiswa dengan hadiah menarik.',
            'date' => '2026-05-15 13:00:00',
            'location' => 'Lab Gaming',
            'price' => 25000,
            'stock' => 80,
            'poster_path' => 'posters/event-2.png',
        ]);

        // --- Seminar IT ---
        \App\Models\Event::create([
            'category_id' => $seminar->id,
            'title' => 'AI & Future Tech Summit',
            'description' => 'Diskusi tren AI dan teknologi masa depan.',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Cinema Unit 6',
            'price' => 50000,
            'stock' => 120,
            'poster_path' => 'posters/event-3.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $seminar->id,
            'title' => 'UI/UX Masterclass',
            'description' => 'Belajar desain UI/UX dari praktisi profesional.',
            'date' => '2026-05-07 09:00:00',
            'location' => 'Ruang Seminar 1',
            'price' => 75000,
            'stock' => 60,
            'poster_path' => 'posters/event-4.png',
        ]);

        // --- Competition ---
        \App\Models\Event::create([
            'category_id' => $competition->id,
            'title' => 'Hackathon 2026',
            'description' => 'Kompetisi coding 24 jam untuk solusi inovatif.',
            'date' => '2026-05-20 08:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 100000,
            'stock' => 50,
            'poster_path' => 'posters/event-5.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $competition->id,
            'title' => 'Web Design Contest',
            'description' => 'Lomba desain website kreatif dan responsif.',
            'date' => '2026-05-25 10:00:00',
            'location' => 'Lab Multimedia',
            'price' => 30000,
            'stock' => 70,
            'poster_path' => 'posters/event-6.png',
        ]);
    }
}
