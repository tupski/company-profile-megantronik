<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Server Pulsa H2H',
                'description' => 'Layanan server pulsa host-to-host yang menghubungkan langsung server kami dengan sistem Anda. Transaksi cepat, stabil, dan aman.',
                'icon' => null,
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Server+Pulsa+H2H',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Paket Data',
                'description' => 'Layanan paket data internet untuk semua operator dengan berbagai pilihan kuota. Harga kompetitif dan proses cepat.',
                'icon' => null,
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Paket+Data',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Token PLN',
                'description' => 'Layanan token listrik PLN dengan berbagai nominal. Proses cepat dan harga kompetitif.',
                'icon' => null,
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Token+PLN',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Voucher Game',
                'description' => 'Layanan voucher game online untuk berbagai platform gaming populer. Proses cepat dan harga kompetitif.',
                'icon' => null,
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Voucher+Game',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'PPOB',
                'description' => 'Layanan pembayaran online untuk berbagai tagihan seperti PDAM, BPJS, PGN, dan lainnya. Proses cepat dan aman.',
                'icon' => null,
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=PPOB',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'title' => 'Tiket Pesawat & Kereta',
                'description' => 'Layanan pemesanan tiket pesawat dan kereta api. Proses cepat dan harga kompetitif.',
                'icon' => null,
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Tiket',
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
