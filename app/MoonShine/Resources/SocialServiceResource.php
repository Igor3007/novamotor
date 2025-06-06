<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\SocialService;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Url;

/**
 * @extends ModelResource<SocialService>
 */
class SocialServiceResource extends ModelResource
{
    protected string $model = SocialService::class;

    protected string $title = 'SocialServices';

    protected function search(): array
    {
        return ['url'];
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Image::make(__('moonshine.fields.image'), 'icon'),
            Url::make('Url')->sortable(),
            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0)->sortable(),

            Switcher::make(__('moonshine.fields.active'),'active')->sortable(),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Image::make(__('moonshine.fields.image'), 'icon'),
                Url::make('Url'),
                Number::make(__('moonshine.fields.sorting'),'sorting')
                    ->default(0),

                Switcher::make(__('moonshine.fields.active'),'active'),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Image::make(__('moonshine.fields.image'), 'icon'),
            Url::make('Url'),
            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0),

            Switcher::make(__('moonshine.fields.active'),'active'),
        ];
    }

    /**
     * @param SocialService $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
