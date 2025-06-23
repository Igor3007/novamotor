<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;


use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\TinyMce\Fields\TinyMce;
use Leeto\Seo\Models\Seo;

/**
 * @extends ModelResource<Seo>
 */
class SeoResource extends ModelResource
{
    protected string $model = Seo::class;

    protected string $title = 'Seo';

    protected function search(): array
    {
        return ['url','title'];
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Url')
                ->required()->sortable(),
            Text::make(__('moonshine.fields.title'), 'title')
                ->required()->sortable(),
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
                Text::make('Url')
                    ->required(),

                Text::make(__('moonshine.fields.title'), 'title')
                    ->required(),

                Text::make(__('moonshine.fields.h1'), 'h1'),

                Text::make(__('moonshine.fields.description'), 'description'),

                Text::make('Keywords'),

                TinyMce::make(__('moonshine.fields.text'), 'text')
                    ->addOption('file_manager', 'laravel-filemanager')
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
            Text::make('Url')
                ->required(),

            Text::make(__('moonshine.fields.title'), 'title')
                ->required(),

            Text::make(__('moonshine.fields.h1'), 'h1'),

            Text::make(__('moonshine.fields.description'), 'description'),

            Text::make('Keywords'),

            TinyMce::make(__('moonshine.fields.text'), 'text')
                ->addOption('file_manager', 'laravel-filemanager')
        ];
    }

    /**
     * @param Seo $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
