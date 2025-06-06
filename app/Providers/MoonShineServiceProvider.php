<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\MenuResource;
use App\MoonShine\Resources\MenuItemResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\SettingResource;
use App\MoonShine\Resources\BannerResource;
use App\MoonShine\Resources\AdvantageResource;
use App\MoonShine\Resources\SeoResource;
use App\MoonShine\Resources\MainPageSettingResource;
use App\MoonShine\Resources\FormAnswerResource;
use App\MoonShine\Resources\FaqResource;
use App\MoonShine\Resources\PropertyResource;
use App\MoonShine\Resources\OfferResource;
use App\MoonShine\Resources\ProductTileResource;
use App\MoonShine\Resources\SocialServiceResource;
use App\MoonShine\Resources\DocumentGroupResource;
use App\MoonShine\Resources\DocumentResource;
use App\MoonShine\Resources\HowBuyBlockResource;
use App\MoonShine\Resources\ObjectResource;
use App\MoonShine\Resources\PolicyBlockResource;
use App\MoonShine\Resources\SpecializationResource;
use App\MoonShine\Resources\VacancyResource;
use App\MoonShine\Resources\ServiceSettingResource;
use App\MoonShine\Resources\AboutSettingResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        // $config->authEnable();

        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                CategoryResource::class,
                ProductResource::class,
                MenuResource::class,
                MenuItemResource::class,
                PageResource::class,
                SettingResource::class,
                BannerResource::class,
                AdvantageResource::class,
                SeoResource::class,
                MainPageSettingResource::class,
                FormAnswerResource::class,
                FaqResource::class,
                PropertyResource::class,
                OfferResource::class,
                ProductTileResource::class,
                SocialServiceResource::class,
                DocumentGroupResource::class,
                DocumentResource::class,
                HowBuyBlockResource::class,
                ObjectResource::class,
                PolicyBlockResource::class,
                SpecializationResource::class,
                VacancyResource::class,
                ServiceSettingResource::class,
                AboutSettingResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
