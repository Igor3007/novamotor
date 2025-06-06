<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Advantage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Advantage>
 */
class AdvantageResource extends ModelResource
{
    protected string $model = Advantage::class;

    protected string $title = 'Advantages';

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

            Text::make(__('moonshine.fields.description'), 'description'),

            Image::make(__('moonshine.fields.image'),'image')
                ->disk('public')
                ->dir('advantages'),
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
                ID::make()->sortable(),

                Text::make(__('moonshine.fields.title'), 'title')
                    ->required(),

                Text::make(__('moonshine.fields.description'), 'description'),

                Image::make(__('moonshine.fields.image'),'image')
                    ->disk('public')
                    ->dir('advantages'),
                Number::make(__('moonshine.fields.sorting'),'sorting')
                    ->default(0),

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
            ID::make()->sortable(),

            Text::make(__('moonshine.fields.title'), 'title')
                ->required(),

            Text::make(__('moonshine.fields.description'), 'description'),

            Image::make(__('moonshine.fields.image'),'image')
                ->disk('public')
                ->dir('advantages'),
            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0),

            Switcher::make(__('moonshine.fields.active'),'active')
        ];
    }

    /**
     * @param Advantage $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
