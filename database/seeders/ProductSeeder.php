<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Pulsa Telkomsel',
                'description' => 'Pulsa Telkomsel dengan berbagai nominal. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Pulsa+Telkomsel',
                'price' => 10000,
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Pulsa XL',
                'description' => 'Pulsa XL dengan berbagai nominal. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Pulsa+XL',
                'price' => 10000,
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Pulsa Indosat',
                'description' => 'Pulsa Indosat dengan berbagai nominal. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Pulsa+Indosat',
                'price' => 10000,
                'is_featured' => true,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Pulsa Axis',
                'description' => 'Pulsa Axis dengan berbagai nominal. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Pulsa+Axis',
                'price' => 10000,
                'is_featured' => false,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Pulsa Smartfren',
                'description' => 'Pulsa Smartfren dengan berbagai nominal. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Pulsa+Smartfren',
                'price' => 10000,
                'is_featured' => false,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'name' => 'Paket Data Telkomsel',
                'description' => 'Paket data Telkomsel dengan berbagai pilihan kuota. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Data+Telkomsel',
                'price' => 50000,
                'is_featured' => true,
                'is_active' => true,
                'order' => 6,
            ],
            [
                'name' => 'Paket Data XL',
                'description' => 'Paket data XL dengan berbagai pilihan kuota. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Data+XL',
                'price' => 50000,
                'is_featured' => false,
                'is_active' => true,
                'order' => 7,
            ],
            [
                'name' => 'Paket Data Indosat',
                'description' => 'Paket data Indosat dengan berbagai pilihan kuota. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Data+Indosat',
                'price' => 50000,
                'is_featured' => false,
                'is_active' => true,
                'order' => 8,
            ],
            [
                'name' => 'Token PLN 20K',
                'description' => 'Token listrik PLN nominal 20.000. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Token+PLN',
                'price' => 21000,
                'is_featured' => true,
                'is_active' => true,
                'order' => 9,
            ],
            [
                'name' => 'Token PLN 50K',
                'description' => 'Token listrik PLN nominal 50.000. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Token+PLN',
                'price' => 51000,
                'is_featured' => false,
                'is_active' => true,
                'order' => 10,
            ],
            [
                'name' => 'Token PLN 100K',
                'description' => 'Token listrik PLN nominal 100.000. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Token+PLN',
                'price' => 101000,
                'is_featured' => false,
                'is_active' => true,
                'order' => 11,
            ],
            [
                'name' => 'Voucher Google Play',
                'description' => 'Voucher Google Play dengan berbagai nominal. Proses cepat dan harga kompetitif.',
                'image' => 'https://placehold.co/600x400/0066cc/ffffff?text=Google+Play',
                'price' => 50000,
                'is_featured' => true,
                'is_active' => true,
                'order' => 12,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
