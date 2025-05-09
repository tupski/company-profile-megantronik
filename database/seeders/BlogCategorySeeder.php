<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Teknologi',
                'slug' => 'teknologi',
                'description' => 'Artikel tentang teknologi terbaru dan perkembangannya.'
            ],
            [
                'name' => 'Bisnis',
                'slug' => 'bisnis',
                'description' => 'Artikel tentang bisnis, strategi, dan tips sukses.'
            ],
            [
                'name' => 'Pulsa & Data',
                'slug' => 'pulsa-data',
                'description' => 'Artikel tentang pulsa, paket data, dan produk digital lainnya.'
            ],
            [
                'name' => 'Tutorial',
                'slug' => 'tutorial',
                'description' => 'Tutorial dan panduan langkah demi langkah.'
            ],
            [
                'name' => 'Berita',
                'slug' => 'berita',
                'description' => 'Berita terbaru seputar industri telekomunikasi dan teknologi.'
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }
    }
}
