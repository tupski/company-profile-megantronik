<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Budi Santoso',
                'position' => 'Pemilik',
                'company' => 'Toko Pulsa Berkah',
                'content' => 'Saya sudah menggunakan layanan Megantronik selama 2 tahun dan sangat puas. Transaksi cepat, harga kompetitif, dan dukungan 24/7 sangat membantu bisnis saya.',
                'image' => 'https://placehold.co/400x400/0066cc/ffffff?text=Budi',
                'rating' => 5,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Siti Rahayu',
                'position' => 'Manager',
                'company' => 'Cellular Shop',
                'content' => 'Megantronik adalah partner bisnis terbaik. Layanan server pulsa H2H mereka sangat stabil dan jarang mengalami gangguan. Sangat direkomendasikan!',
                'image' => 'https://placehold.co/400x400/0066cc/ffffff?text=Siti',
                'rating' => 5,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Ahmad Hidayat',
                'position' => 'Owner',
                'company' => 'Hidayat Cell',
                'content' => 'Harga yang ditawarkan Megantronik sangat kompetitif. Saya bisa mendapatkan keuntungan lebih banyak dibandingkan menggunakan server lain. Terima kasih Megantronik!',
                'image' => 'https://placehold.co/400x400/0066cc/ffffff?text=Ahmad',
                'rating' => 4,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Dewi Lestari',
                'position' => 'Direktur',
                'company' => 'Lestari Cellular',
                'content' => 'Saya sangat terkesan dengan kecepatan transaksi di Megantronik. Hampir semua transaksi diproses dalam hitungan detik. Pelanggan saya sangat puas!',
                'image' => 'https://placehold.co/400x400/0066cc/ffffff?text=Dewi',
                'rating' => 5,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Rudi Hartono',
                'position' => 'Supervisor',
                'company' => 'Hartono Group',
                'content' => 'Tim dukungan Megantronik sangat responsif dan profesional. Setiap masalah selalu diselesaikan dengan cepat. Sangat merekomendasikan layanan mereka!',
                'image' => 'https://placehold.co/400x400/0066cc/ffffff?text=Rudi',
                'rating' => 4,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'name' => 'Rina Wijaya',
                'position' => 'CEO',
                'company' => 'Wijaya Cellular',
                'content' => 'Megantronik adalah pilihan terbaik untuk bisnis pulsa. Sistem mereka sangat mudah digunakan dan fitur-fiturnya lengkap. Saya sangat puas dengan layanan mereka!',
                'image' => 'https://placehold.co/400x400/0066cc/ffffff?text=Rina',
                'rating' => 5,
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
