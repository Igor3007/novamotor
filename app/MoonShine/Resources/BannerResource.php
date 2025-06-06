<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Banner;

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
 * @extends ModelResource<Banner>
 */
class BannerResource extends ModelResource
{
    protected string $model = Banner::class;

    protected string $title = 'Banners';

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
            Text::make(__('moonshine.fields.title'), 'title'),
            Image::make(__('moonshine.fields.image'),'image')
                ->disk('public')
                ->dir('banners'),

            Text::make(__('moonshine.fields.url'), 'url')
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

                Image::make(__('moonshine.fields.image'),'image')
                    ->disk('public')
                    ->dir('banners'),

                Text::make(__('moonshine.fields.title'), 'title'),
                TinyMce::make(__('moonshine.fields.text'), 'text')
                    ->addOption('file_manager', 'laravel-filemanager'),

                Text::make(__('moonshine.fields.btn_title'), 'btn_title')
                    ->required(),
                Text::make(__('moonshine.fields.url'), 'url')
                    ->required(),

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
            ID::make(),
            Image::make(__('moonshine.fields.image'),'image')
                ->disk('public')
                ->dir('banners'),

            Text::make(__('moonshine.fields.title'), 'title'),
            TinyMce::make(__('moonshine.fields.text'), 'text')
                ->addOption('file_manager', 'laravel-filemanager'),

            Text::make(__('moonshine.fields.btn_title'), 'btn_title')
                ->required(),
            Text::make(__('moonshine.fields.url'), 'url')
                ->required(),

            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0),

            Switcher::make(__('moonshine.fields.active'),'active')
        ];
    }

    /**
     * @param Banner $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
