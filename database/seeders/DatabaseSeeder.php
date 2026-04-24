<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

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

        $sport = \App\Models\Category::create([
            'name' => 'Olahraga & Kompetisi',
            'slug' => 'olahraga-kompetisi',
        ]);

        // 3. Events

        // Entertainment
        \App\Models\Event::create([
            'category_id' => $entertainment->id,
            'title' => 'Jazz Night 2026',
            'description' => 'Nikmati malam santai dengan alunan musik jazz.',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-1.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $entertainment->id,
            'title' => 'Campus Movie Festival',
            'description' => 'Festival film karya mahasiswa terbaik.',
            'date' => '2026-05-15 18:30:00',
            'location' => 'Cinema Unit 6',
            'price' => 30000,
            'stock' => 80,
            'poster_path' => 'posters/event-4.png',
        ]);

        //  Seminar IT
        \App\Models\Event::create([
            'category_id' => $seminar->id,
            'title' => 'Hackathon - Unleash Your Inner Developer',
            'description' => 'Kompetisi coding untuk menciptakan solusi inovatif.',
            'date' => '2026-05-05 10:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-2.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $seminar->id,
            'title' => 'AI & Future Tech Summit 2026',
            'description' => 'Eksplorasi tren AI dan teknologi masa depan.',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Cinema Unit 6',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-3.png',
        ]);

        //  Olahraga & Kompetisi
        \App\Models\Event::create([
            'category_id' => $sport->id,
            'title' => 'E-Sport U-Champ Tournament',
            'description' => 'Turnamen e-sport antar mahasiswa.',
            'date' => '2026-05-20 09:00:00',
            'location' => 'Hall Amikom',
            'price' => 25000,
            'stock' => 120,
            'poster_path' => 'posters/event-5.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $sport->id,
            'title' => 'Fun Run 5K Amikom',
            'description' => 'Lari santai 5KM untuk kesehatan dan kebersamaan.',
            'date' => '2026-05-25 06:00:00',
            'location' => 'Lapangan Kampus',
            'price' => 20000,
            'stock' => 150,
            'poster_path' => 'posters/event-6.png',
        ]);

        // 4. User tambahan
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
