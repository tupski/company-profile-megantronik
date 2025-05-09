<?php

namespace Database\Seeders;

use App\Models\BlogTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'Pulsa', 'slug' => 'pulsa'],
            ['name' => 'Data', 'slug' => 'data'],
            ['name' => 'Internet', 'slug' => 'internet'],
            ['name' => 'Aplikasi', 'slug' => 'aplikasi'],
            ['name' => 'Android', 'slug' => 'android'],
            ['name' => 'iOS', 'slug' => 'ios'],
            ['name' => 'Bisnis', 'slug' => 'bisnis'],
            ['name' => 'Startup', 'slug' => 'startup'],
            ['name' => 'Tips', 'slug' => 'tips'],
            ['name' => 'Tutorial', 'slug' => 'tutorial'],
            ['name' => 'Berita', 'slug' => 'berita'],
            ['name' => 'Promo', 'slug' => 'promo'],
        ];

        foreach ($tags as $tag) {
            BlogTag::create($tag);
        }
    }
}
