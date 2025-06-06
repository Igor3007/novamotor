<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Resources\AdvantageResource;
use App\MoonShine\Resources\BannerResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\FaqResource;
use App\MoonShine\Resources\MainPageSettingResource;
use App\MoonShine\Resources\MenuItemResource;
use App\MoonShine\Resources\MenuResource;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\SeoResource;
use App\MoonShine\Resources\SettingResource;
use MoonShine\Laravel\Layouts\CompactLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\FormAnswerResource;
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

final class MoonShineLayout extends CompactLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(__('moonshine.resource.catalog'), [
                MenuItem::make(
                    __('moonshine.resource.categories'),
                    CategoryResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.products'),
                    ProductResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.offers'),
                    OfferResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.properties'),
                    PropertyResource::class
                ),
            ]),

            MenuGroup::make(__('moonshine.resource.documents'), [
                MenuItem::make(__('moonshine.resource.groups'), DocumentGroupResource::class),
                MenuItem::make(__('moonshine.resource.documents'), DocumentResource::class),
            ]),

            MenuGroup::make(__('moonshine.resource.pages'), [
                MenuItem::make(__('moonshine.resource.objects'), ObjectResource::class),
                MenuItem::make(__('moonshine.resource.how_buy'), HowBuyBlockResource::class),

                MenuItem::make(__('moonshine.resource.service'), ServiceSettingResource::class),
                MenuItem::make(__('moonshine.resource.about'), AboutSettingResource::class),

                MenuItem::make(__('moonshine.resource.policy'), PolicyBlockResource::class),
                MenuItem::make(__('moonshine.resource.vacancies'), VacancyResource::class),
            ]),


            MenuGroup::make(__('moonshine.resource.content'), [
                MenuItem::make(
                    __('moonshine.resource.pages'),
                    PageResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.banners'),
                    BannerResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.advantages'),
                    AdvantageResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.faqs'),
                    FaqResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.product-tiles'),
                    ProductTileResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.menu-items'),
                    MenuItemResource::class
                ),

                MenuItem::make(__('moonshine.resource.specializations'), SpecializationResource::class),
                MenuItem::make(__('moonshine.resource.social_services'), SocialServiceResource::class),

                MenuItem::make(
                    __('moonshine.resource.seo'),
                    SeoResource::class
                ),

            ]),

            MenuGroup::make(__('moonshine.resource.system'), [
                MenuItem::make(
                    __('moonshine.resource.forms'),
                    FormAnswerResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.settings'),
                    SettingResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.mainpage_settings'),
                    MainPageSettingResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.admins_title'),
                    MoonShineUserResource::class
                ),
                MenuItem::make(
                    __('moonshine.resource.role_title'),
                    MoonShineUserRoleResource::class
                ),
            ]),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
