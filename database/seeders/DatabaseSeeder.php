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
        // 1. Admin
        User::firstOrCreate(
            ['email' => 'admin@amikom.ac.id'],
            [
                'name' => 'Admin Amikom',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        // 2. User Test
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
                'role' => 'user',
            ]
        );

        // 3. Categories
        $seminar = \App\Models\Category::firstOrCreate(
            ['slug' => 'seminar-it'],
            ['name' => 'Seminar IT']
        );

        $entertainment = \App\Models\Category::firstOrCreate(
            ['slug' => 'entertainment'],
            ['name' => 'Entertainment']
        );

        $sport = \App\Models\Category::firstOrCreate(
            ['slug' => 'olahraga-kompetisi'],
            ['name' => 'Olahraga & Kompetisi']
        );

        // 4. Events

        // Entertainment
        \App\Models\Event::firstOrCreate(
            ['title' => 'Jazz Night 2026'],
            [
                'category_id' => $entertainment->id,
                'description' => 'Nikmati malam santai dengan alunan musik jazz.',
                'date' => '2026-05-10 19:00:00',
                'location' => 'Amikom Baru',
                'price' => 50000,
                'stock' => 100,
                'poster_path' => 'posters/event-1.png',
            ]
        );

        \App\Models\Event::firstOrCreate(
            ['title' => 'Campus Movie Festival'],
            [
                'category_id' => $entertainment->id,
                'description' => 'Festival film karya mahasiswa terbaik.',
                'date' => '2026-05-15 18:30:00',
                'location' => 'Cinema Unit 6',
                'price' => 30000,
                'stock' => 80,
                'poster_path' => 'posters/event-4.png',
            ]
        );

        // Seminar IT
        \App\Models\Event::firstOrCreate(
            ['title' => 'Hackathon - Unleash Your Inner Developer'],
            [
                'category_id' => $seminar->id,
                'description' => 'Kompetisi coding untuk menciptakan solusi inovatif.',
                'date' => '2026-05-05 10:00:00',
                'location' => 'Inkubator Amikom',
                'price' => 50000,
                'stock' => 100,
                'poster_path' => 'posters/event-2.png',
            ]
        );

        \App\Models\Event::firstOrCreate(
            ['title' => 'AI & Future Tech Summit 2026'],
            [
                'category_id' => $seminar->id,
                'description' => 'Eksplorasi tren AI dan teknologi masa depan.',
                'date' => '2026-05-01 13:00:00',
                'location' => 'Cinema Unit 6',
                'price' => 50000,
                'stock' => 100,
                'poster_path' => 'posters/event-3.png',
            ]
        );

        // Sport
        \App\Models\Event::firstOrCreate(
            ['title' => 'E-Sport U-Champ Tournament'],
            [
                'category_id' => $sport->id,
                'description' => 'Turnamen e-sport antar mahasiswa.',
                'date' => '2026-05-20 09:00:00',
                'location' => 'Hall Amikom',
                'price' => 25000,
                'stock' => 120,
                'poster_path' => 'posters/event-5.png',
            ]
        );

        \App\Models\Event::firstOrCreate(
            ['title' => 'Fun Run 5K Amikom'],
            [
                'category_id' => $sport->id,
                'description' => 'Lari santai 5KM untuk kesehatan dan kebersamaan.',
                'date' => '2026-05-25 06:00:00',
                'location' => 'Lapangan Kampus',
                'price' => 20000,
                'stock' => 150,
                'poster_path' => 'posters/event-6.png',
            ]
        );
    }
}
