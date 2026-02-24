<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records
        Setting::truncate();

        // Seed new data
        Setting::create([
            'app_name' => 'Medikosh Nutria',
            'email' => 'Care@medikoshnutria.com',
            'whatsapp' => '9720030123',
            'contact' => '9720030123',
            'cin_no' => '',
            'pan' => '',
            'tan' => '',
            'about' => 'Medikosh Nutria is a premium nutraceutical company in India and a subsidiary of Medikosh Healthovation Private Limited. We were founded with a clear vision—to make reliable, science-based nutrition accessible to more people.',
            'address' => 'Ranikhet Tower, Dewalchaur, Haldwani, Dis: Nainital Uttarakhand-263139',
            'header_image' => "assets/front/images/header.jpg",
            'is_fresh' => 1,
        ]);
    }
}
