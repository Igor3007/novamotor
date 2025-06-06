<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(AdvantageSeeder::class);
        $this->call(MainPageSettingSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(OfferSeeder::class);
        $this->call(SocialServiceSeeder::class);
        $this->call(ProductTileSeeder::class);

        $this->call(DocumentGroupSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(HowBuyBlocksSeeder::class);
        $this->call(ObjectSeeder::class);
        $this->call(PolicyBlockSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(VacancySeeder::class);
        $this->call(ServiceSettingsSeeder::class);
        $this->call(AboutSettingSeeder::class);
    }
}
