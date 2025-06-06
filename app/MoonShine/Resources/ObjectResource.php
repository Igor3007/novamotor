<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\ObjectModel;
use Illuminate\Database\Eloquent\Model;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<ObjectModel>
 */
class ObjectResource extends ModelResource
{
    protected string $model = ObjectModel::class;

    protected string $title = 'Objects';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make(__('moonshine.fields.title'), 'title')
                ->required()->sortable(),

            Image::make(__('moonshine.fields.image'), 'image')
                ->dir('objects')
                ->required(),

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

                Textarea::make(__('moonshine.fields.text'), 'text')
                    ->required(),

                Image::make(__('moonshine.fields.image'), 'image')
                    ->dir('objects'),

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
            Text::make(__('moonshine.fields.title'), 'title')
                ->required(),

            Textarea::make(__('moonshine.fields.text'), 'text')
                ->required(),

            Image::make(__('moonshine.fields.image'), 'image')
                ->dir('objects')
                ->required(),

            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0),
            Switcher::make(__('moonshine.fields.active'),'active'),
        ];
    }

    /**
     * @param ObjectModel $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
