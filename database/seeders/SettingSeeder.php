<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            [
                'key' => 'site_name',
                'value' => 'Megantronik',
                'group' => 'general',
            ],
            [
                'key' => 'site_description',
                'value' => 'Server Pulsa H2H Terpercaya',
                'group' => 'general',
            ],
            [
                'key' => 'site_logo',
                'value' => 'https://placehold.co/200x80/0066cc/ffffff?text=Megantronik',
                'group' => 'general',
            ],
            [
                'key' => 'site_favicon',
                'value' => 'https://placehold.co/32x32/0066cc/ffffff?text=M',
                'group' => 'general',
            ],

            // Contact Settings
            [
                'key' => 'contact_email',
                'value' => 'info@megantronik.com',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_phone',
                'value' => '+62 123 4567 890',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_address',
                'value' => 'Jl. Contoh No. 123, Kota, Indonesia',
                'group' => 'contact',
            ],

            // Social Media Settings
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/megantronik',
                'group' => 'social',
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://instagram.com/megantronik',
                'group' => 'social',
            ],
            [
                'key' => 'social_twitter',
                'value' => 'https://twitter.com/megantronik',
                'group' => 'social',
            ],
            [
                'key' => 'social_youtube',
                'value' => 'https://youtube.com/megantronik',
                'group' => 'social',
            ],

            // Footer Settings
            [
                'key' => 'footer_text',
                'value' => '© ' . date('Y') . ' Megantronik. All rights reserved.',
                'group' => 'footer',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
