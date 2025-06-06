<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\MenuItem;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<MenuItem>
 */
class MenuItemResource extends ModelResource
{
    protected string $model = MenuItem::class;

    protected string $title = 'MenuItems';

    protected array $with = ['menu','parent'];

    protected function search(): array
    {
        return ['title','url'];
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make(
                __('moonshine.resource.menu'),
                'menu',
                resource: MenuResource::class
            ),
            Text::make(__('moonshine.fields.title'), 'title')
                ->required()->sortable(),
            Text::make(__('moonshine.fields.url'), 'url')
                ->required()->sortable(),

            BelongsTo::make(
                __('moonshine.fields.parent'),
                'parent',
                resource: MenuResource::class
            ),

            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0)->sortable(),
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
                    __('moonshine.resource.menu'),
                    'menu',
                    resource: MenuResource::class
                ),
                Text::make(__('moonshine.fields.title'), 'title')
                    ->required(),
                Text::make(__('moonshine.fields.url'), 'url')
                    ->required(),

                BelongsTo::make(
                    __('moonshine.fields.parent'),
                    'parent',
                    resource: MenuResource::class
                )->nullable(),

                Number::make(__('moonshine.fields.sorting'),'sorting')
                    ->default(0),
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
        ];
    }

    /**
     * @param MenuItem $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
