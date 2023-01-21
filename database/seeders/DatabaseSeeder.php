<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Region;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $regions = ['Kachin', 'Kayarr', 'Kayin', 'Chin', 'Mon', 'Rakhine', 'Shan', 'Yangon', 'Mandalay', 'Bago', 'Sagine', 'Magway', 'Ayarwaddy', 'Tanintharyi'];
        foreach ($regions as $region) {
            Region::create([
                'name' => $region,
            ]);
        }
    }
}