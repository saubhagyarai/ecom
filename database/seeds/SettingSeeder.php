<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
        'phone' => 'phone',
        'email' => 'email',
        'address' => 'address',
        'map' => 'map',
        'top_ad1_text' => 'top_ad1_text',
        'top_ad2_text' => 'top_ad2_text',
        'top_ad3_text' => 'top_ad3_text',
        'bottom_ad_text' => 'bottom_ad_text',
        'favicon' => 'fav.jpg',
        'logo' => 'logo.jpg',
        'top_ad1_img' => 'img.jpg',
        'top_ad2_img' => 'img.jpg',
        'top_ad3_img' => 'img.jpg',
        'bottom_ad_img' => 'img.jpg'
        ]);
    }
}
