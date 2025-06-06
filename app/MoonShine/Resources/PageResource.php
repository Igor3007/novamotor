<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Page;

use MoonShine\Laravel\Fields\Slug;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;
use MoonShine\TinyMce\Fields\TinyMce;

/**
 * @extends ModelResource<Page>
 */
class PageResource extends ModelResource
{
    protected string $model = Page::class;

    protected string $title = 'Pages';

    protected function search(): array
    {
        return ['title','slug'];
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
            Slug::make(__('moonshine.fields.slug'),'slug')
                ->from('title')
                ->unique(),
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
                Slug::make(__('moonshine.fields.slug'),'slug')
                    ->from('title')
                    ->unique(),

                Switcher::make(__('moonshine.fields.active'),'active'),

                TinyMce::make(__('moonshine.fields.text'),'text')
                    ->addOption('file_manager', 'laravel-filemanager'),
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
     * @param Page $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
