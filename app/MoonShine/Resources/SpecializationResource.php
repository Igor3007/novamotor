<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Specialization;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Specialization>
 */
class SpecializationResource extends ModelResource
{
    protected string $model = Specialization::class;

    protected string $title = 'Specializations';

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
                    ->required()->sortable(),

                TinyMce::make(__('moonshine.fields.description'), 'text')
                    ->addOption('file_manager', 'laravel-filemanager'),

                Number::make(__('moonshine.fields.sorting'),'sorting')
                    ->default(0)->sortable(),

                Switcher::make(__('moonshine.fields.active'),'active')->sortable(),
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
                ->required()->sortable(),

            TinyMce::make(__('moonshine.fields.description'), 'text')
                ->addOption('file_manager', 'laravel-filemanager'),

            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0)->sortable(),

            Switcher::make(__('moonshine.fields.active'),'active')->sortable(),
        ];
    }

    /**
     * @param Specialization $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
