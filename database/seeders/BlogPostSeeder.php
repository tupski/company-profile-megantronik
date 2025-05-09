<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada user admin
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
            ]);
        }

        // Dapatkan kategori dan tag
        $categories = BlogCategory::all();
        $tags = BlogTag::all();

        // Buat 10 artikel dummy
        $posts = [
            [
                'title' => 'Cara Mengisi Pulsa dengan Cepat dan Mudah',
                'slug' => 'cara-mengisi-pulsa-dengan-cepat-dan-mudah',
                'excerpt' => 'Panduan lengkap cara mengisi pulsa dengan cepat dan mudah melalui berbagai metode pembayaran.',
                'content' => '<p>Mengisi pulsa adalah kebutuhan rutin bagi pengguna ponsel. Berikut adalah cara-cara mengisi pulsa dengan cepat dan mudah:</p>
                <h3>1. Melalui Mobile Banking</h3>
                <p>Hampir semua bank memiliki layanan mobile banking yang memungkinkan Anda mengisi pulsa kapan saja dan di mana saja. Cukup buka aplikasi mobile banking, pilih menu "Pembelian Pulsa", masukkan nomor telepon dan nominal yang diinginkan, lalu ikuti petunjuk selanjutnya.</p>
                <h3>2. Melalui E-Wallet</h3>
                <p>E-wallet seperti OVO, GoPay, DANA, dan LinkAja juga menyediakan layanan pembelian pulsa. Caranya hampir sama dengan mobile banking, pilih menu "Pulsa", masukkan nomor telepon dan nominal, lalu bayar menggunakan saldo e-wallet Anda.</p>
                <h3>3. Melalui Minimarket</h3>
                <p>Anda juga bisa mengisi pulsa di minimarket seperti Indomaret, Alfamart, dan sejenisnya. Cukup beritahu kasir nomor telepon dan nominal pulsa yang ingin dibeli, lalu bayar sesuai harga yang ditentukan.</p>
                <h3>4. Melalui Website Resmi Operator</h3>
                <p>Operator seluler seperti Telkomsel, XL, dan Indosat memiliki website resmi yang menyediakan layanan pembelian pulsa online. Kunjungi website operator, pilih menu "Beli Pulsa", masukkan nomor telepon dan nominal, lalu bayar menggunakan metode pembayaran yang tersedia.</p>
                <h3>5. Melalui Aplikasi Megantronik</h3>
                <p>Megantronik menyediakan layanan pembelian pulsa dengan harga kompetitif dan proses yang cepat. Download aplikasi Megantronik, daftar atau login, pilih menu "Pulsa", masukkan nomor telepon dan nominal, lalu bayar menggunakan saldo atau metode pembayaran lainnya.</p>
                <p>Dengan berbagai metode di atas, mengisi pulsa kini menjadi lebih mudah dan cepat. Pilih metode yang paling nyaman untuk Anda!</p>',
                'featured_image' => 'https://placehold.co/800x400/0066cc/ffffff?text=Cara+Mengisi+Pulsa',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(5),
                'blog_category_id' => $categories->where('slug', 'tutorial')->first()->id ?? $categories->first()->id,
            ],
            [
                'title' => '5 Paket Internet Terbaik untuk Work From Home',
                'slug' => '5-paket-internet-terbaik-untuk-work-from-home',
                'excerpt' => 'Rekomendasi paket internet terbaik untuk kebutuhan work from home dengan kecepatan tinggi dan harga terjangkau.',
                'content' => '<p>Bekerja dari rumah (work from home) membutuhkan koneksi internet yang stabil dan cepat. Berikut adalah 5 paket internet terbaik untuk kebutuhan work from home:</p>
                <h3>1. Paket Internet Unlimited XL Home</h3>
                <p>XL Home menawarkan paket internet unlimited dengan kecepatan hingga 100 Mbps. Paket ini cocok untuk kebutuhan video conference, transfer file besar, dan browsing. Harga mulai dari Rp 300.000 per bulan.</p>
                <h3>2. Paket Internet Indihome Fiber</h3>
                <p>Indihome Fiber menawarkan paket internet dengan teknologi fiber optic yang stabil dan cepat. Kecepatan mulai dari 20 Mbps hingga 300 Mbps dengan harga mulai dari Rp 250.000 per bulan.</p>
                <h3>3. Paket Internet First Media</h3>
                <p>First Media menawarkan paket internet dengan kecepatan hingga 200 Mbps. Paket ini juga dilengkapi dengan TV kabel dan telepon rumah. Harga mulai dari Rp 350.000 per bulan.</p>
                <h3>4. Paket Internet Biznet Home</h3>
                <p>Biznet Home menawarkan paket internet dengan kecepatan hingga 250 Mbps. Paket ini cocok untuk kebutuhan streaming, gaming, dan video conference. Harga mulai dari Rp 280.000 per bulan.</p>
                <h3>5. Paket Internet MNC Play</h3>
                <p>MNC Play menawarkan paket internet dengan kecepatan hingga 150 Mbps. Paket ini juga dilengkapi dengan TV kabel dan telepon rumah. Harga mulai dari Rp 300.000 per bulan.</p>
                <p>Pilih paket internet yang sesuai dengan kebutuhan dan budget Anda. Pastikan juga untuk memeriksa ketersediaan layanan di area tempat tinggal Anda sebelum berlangganan.</p>',
                'featured_image' => 'https://placehold.co/800x400/0066cc/ffffff?text=Paket+Internet+WFH',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(3),
                'blog_category_id' => $categories->where('slug', 'pulsa-data')->first()->id ?? $categories->first()->id,
            ],
            [
                'title' => 'Perkembangan Teknologi 5G di Indonesia',
                'slug' => 'perkembangan-teknologi-5g-di-indonesia',
                'excerpt' => 'Mengenal perkembangan teknologi 5G di Indonesia dan manfaatnya bagi masyarakat dan industri.',
                'content' => '<p>Teknologi 5G merupakan generasi kelima dari teknologi jaringan seluler yang menawarkan kecepatan lebih tinggi, latensi lebih rendah, dan kapasitas lebih besar dibandingkan generasi sebelumnya. Berikut adalah perkembangan teknologi 5G di Indonesia:</p>
                <h3>Sejarah 5G di Indonesia</h3>
                <p>Pemerintah Indonesia melalui Kementerian Komunikasi dan Informatika (Kominfo) telah melakukan uji coba teknologi 5G sejak tahun 2019. Pada tahun 2021, Kominfo resmi menggelar lelang spektrum frekuensi untuk layanan 5G.</p>
                <h3>Operator Penyedia Layanan 5G</h3>
                <p>Beberapa operator telekomunikasi di Indonesia yang telah menggelar layanan 5G antara lain Telkomsel, XL Axiata, dan Indosat Ooredoo. Telkomsel menjadi operator pertama yang meluncurkan layanan 5G secara komersial pada Mei 2021.</p>
                <h3>Cakupan Layanan 5G</h3>
                <p>Saat ini, layanan 5G masih terbatas di beberapa kota besar seperti Jakarta, Surabaya, Bandung, dan Makassar. Pemerintah dan operator terus berupaya memperluas cakupan layanan 5G ke lebih banyak daerah di Indonesia.</p>
                <h3>Manfaat 5G bagi Masyarakat</h3>
                <p>Teknologi 5G menawarkan berbagai manfaat bagi masyarakat, seperti kecepatan internet yang lebih tinggi, streaming video dengan kualitas lebih baik, gaming online dengan latensi rendah, dan penggunaan aplikasi yang membutuhkan bandwidth besar.</p>
                <h3>Manfaat 5G bagi Industri</h3>
                <p>Bagi industri, teknologi 5G membuka peluang untuk pengembangan Internet of Things (IoT), smart city, autonomous vehicle, telemedicine, dan berbagai inovasi lainnya yang membutuhkan koneksi internet cepat dan stabil.</p>
                <h3>Tantangan Pengembangan 5G</h3>
                <p>Meskipun menawarkan berbagai manfaat, pengembangan teknologi 5G di Indonesia masih menghadapi beberapa tantangan, seperti ketersediaan infrastruktur, alokasi spektrum frekuensi, dan investasi yang besar.</p>
                <p>Dengan terus berkembangnya teknologi 5G di Indonesia, diharapkan dapat mendorong transformasi digital dan pertumbuhan ekonomi di berbagai sektor.</p>',
                'featured_image' => 'https://placehold.co/800x400/0066cc/ffffff?text=Teknologi+5G',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => now()->subDays(7),
                'blog_category_id' => $categories->where('slug', 'teknologi')->first()->id ?? $categories->first()->id,
            ],
        ];

        foreach ($posts as $post) {
            $newPost = BlogPost::create([
                'user_id' => $user->id,
                'blog_category_id' => $post['blog_category_id'],
                'title' => $post['title'],
                'slug' => $post['slug'],
                'excerpt' => $post['excerpt'],
                'content' => $post['content'],
                'featured_image' => $post['featured_image'],
                'is_published' => $post['is_published'],
                'is_featured' => $post['is_featured'],
                'published_at' => $post['published_at'],
            ]);

            // Tambahkan tag secara acak
            $newPost->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );
        }
    }
}
