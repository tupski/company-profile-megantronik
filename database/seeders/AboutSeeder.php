<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'Tentang Megantronik',
            'content' => 'Megantronik adalah perusahaan server pulsa H2H (Host to Host) yang berdiri sejak tahun 2015. Kami berkomitmen untuk memberikan layanan terbaik dengan harga kompetitif, transaksi cepat, dan dukungan 24/7.

Sebagai perusahaan yang bergerak di bidang teknologi dan telekomunikasi, Megantronik terus berinovasi untuk mengembangkan sistem yang lebih baik dan lebih efisien. Kami memahami kebutuhan mitra kami dan selalu berusaha untuk memberikan solusi terbaik.

Dengan tim yang berpengalaman dan profesional, Megantronik siap membantu Anda mengembangkan bisnis pulsa dan produk digital lainnya. Kami percaya bahwa kesuksesan mitra adalah kesuksesan kami juga.',
            'image' => 'https://placehold.co/800x600/0066cc/ffffff?text=About+Megantronik',
            'vision' => 'Menjadi server pulsa H2H terdepan di Indonesia yang memberikan layanan terbaik dan terpercaya untuk semua mitra.',
            'mission' => 'Menyediakan layanan server pulsa H2H dengan harga kompetitif, transaksi cepat, dan dukungan 24/7 untuk membantu mitra kami tumbuh dan berkembang.',
            'history' => 'Megantronik didirikan pada tahun 2015 oleh sekelompok profesional yang memiliki pengalaman di bidang teknologi dan telekomunikasi. Berawal dari sebuah ide untuk membuat sistem server pulsa yang lebih baik, Megantronik terus berkembang hingga saat ini.

Pada tahun 2016, Megantronik mulai memperluas layanan dengan menambahkan produk digital lainnya seperti paket data, token PLN, dan voucher game. Pada tahun 2018, Megantronik meluncurkan sistem baru yang lebih stabil dan efisien.

Saat ini, Megantronik telah melayani ribuan mitra di seluruh Indonesia dan terus berkembang untuk memberikan layanan terbaik.',
            'is_active' => true,
        ]);
    }
}
