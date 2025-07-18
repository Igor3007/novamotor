<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Property>
 */
class PropertyResource extends ModelResource
{
    protected string $model = Property::class;

    protected string $title = 'Properties';

    protected function search(): array
    {
        return ['title'];
    }
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),

            Text::make(__('moonshine.fields.title'), 'title')
                ->required()->sortable(),

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
                Text::make(__('moonshine.fields.title'), 'title')
                    ->required(),

                Number::make(__('moonshine.fields.sorting'),'sorting')
                    ->default(0)->sortable(),

                Switcher::make(__('moonshine.fields.show_in_category'),'show_in_category'),

                Switcher::make(__('moonshine.fields.active'),'active')
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
            Text::make(__('moonshine.fields.title'), 'title')
                ->required(),

            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0),

            Switcher::make(__('moonshine.fields.show_in_category'),'show_in_category'),
            Switcher::make(__('moonshine.fields.active'),'active'),
        ];
    }

    /**
     * @param Property $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
