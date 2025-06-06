<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Offer;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Offer>
 */
class OfferResource extends ModelResource
{
    protected string $model = Offer::class;

    protected string $title = 'Offers';

    protected function search(): array
    {
        return ['title'];
    }

    protected array $with = ['product'];

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make(
                __('moonshine.fields.product'),
                'product',
                'title',
                resource: ProductResource::class
            )->searchable(),

            Text::make(__('moonshine.fields.title'), 'title')
                ->required(),

            Text::make(__('moonshine.fields.price'), 'price')
                ->required(),

            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0),

            Switcher::make(__('moonshine.fields.active'),'active'),
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
                BelongsTo::make(
                    __('moonshine.fields.product'),
                    'product',
                    'title',
                    resource: ProductResource::class
                )->searchable(),

                Text::make(__('moonshine.fields.title'), 'title')
                    ->required(),

                Text::make(__('moonshine.fields.price'), 'price')
                    ->required(),

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
            BelongsTo::make(
                __('moonshine.fields.product'),
                'product',
                'title',
                resource: ProductResource::class
            )->searchable(),

            Text::make(__('moonshine.fields.title'), 'title')
                ->nullable()->sortable(),

            Number::make(__('moonshine.fields.price'), 'price')
                ->required(),

            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0)->sortable(),

            Switcher::make(__('moonshine.fields.active'),'active')->sortable(),
        ];
    }

    /**
     * @param Offer $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
