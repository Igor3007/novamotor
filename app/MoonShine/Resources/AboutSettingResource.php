<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\AboutSetting;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Json;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Url;

/**
 * @extends ModelResource<AboutSetting>
 */
class AboutSettingResource extends ModelResource
{
    protected string $model = AboutSetting::class;

    protected string $title = 'AboutSettings';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make(__('moonshine.fields.title'), 'title')->nullable(),

            Image::make(__('moonshine.fields.image'), 'image')
                ->disk('public')
                ->dir('about'),

            Json::make(__('moonshine.fields.phones'), 'phones')
                ->fields([
                    Text::make(__('moonshine.fields.phone'), 'phone'),
                ]),

            Text::make(__('moonshine.fields.btn_text'), 'btn_text')
                ->nullable(),
            Text::make(__('moonshine.fields.btn_url'), 'btn_url')
                ->nullable(),
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

                Text::make(__('moonshine.fields.title'), 'title')->nullable(),

                TinyMce::make(__('moonshine.fields.text'), 'text')
                    ->addOption('file_manager', 'laravel-filemanager')
                    ->nullable(),

                Image::make(__('moonshine.fields.image'), 'image')
                    ->disk('public')
                    ->dir('about'),

                Json::make(__('moonshine.fields.phones'), 'phones')
                    ->fields([
                        Text::make(__('moonshine.fields.phone'), 'phone'),
                    ]),

                Text::make(__('moonshine.fields.btn_text'), 'btn_text')
                    ->nullable(),
                Text::make(__('moonshine.fields.btn_url'), 'btn_url')
                    ->nullable(),
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
            Text::make(__('moonshine.fields.title'), 'title')->nullable(),

            TinyMce::make(__('moonshine.fields.text'), 'text')
                ->addOption('file_manager', 'laravel-filemanager')
                ->nullable(),

            Image::make(__('moonshine.fields.image'), 'image')
                ->disk('public')
                ->dir('about'),

            Json::make(__('moonshine.fields.phones'), 'phones')
                ->fields([
                    Text::make(__('moonshine.fields.phone'), 'phone'),
                ]),

            Text::make(__('moonshine.fields.btn_text'), 'btn_text')
                ->nullable(),
            Url::make(__('moonshine.fields.btn_url'), 'btn_url')
                ->nullable(),
        ];
    }

    /**
     * @param AboutSetting $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
