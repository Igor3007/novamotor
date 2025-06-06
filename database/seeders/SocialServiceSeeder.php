<?php

namespace Database\Seeders;

use App\Models\SocialService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class SocialServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialServices = [
            [
                'url' => '#',
                'icon' => 'assets/images/icons/ic_telegram.svg'
            ],
            [
                'url' => '#',
                'icon' => 'assets/images/icons/ic_whatsapp.svg'
            ],
        ];

        foreach($socialServices as $i => $socialService) {
            $image = Storage::drive('public')->putFile('social_service', new File(public_path($socialService['icon'])));

            SocialService::factory()->create([
                'url' => $socialService['url'],
                'icon' => $image,
                'sorting' => $i,
                'active' => true
            ]);
        }
    }
}
