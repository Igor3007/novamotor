<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\MainPageSetting;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Text;
use MoonShine\TinyMce\Fields\TinyMce;

/**
 * @extends ModelResource<MainPageSetting>
 */
class MainPageSettingResource extends ModelResource
{
    protected string $model = MainPageSetting::class;

    protected string $title = 'MainPageSettings';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make(__('moonshine.fields.form_title'), 'form_title'),
            Text::make(__('moonshine.fields.about_btn_title'), 'about_btn_title'),
            Text::make(__('moonshine.fields.about_btn_url'), 'about_btn_url'),
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

                Text::make(__('moonshine.fields.form_title'), 'form_title'),
                Text::make(__('moonshine.fields.form_text'), 'form_text'),
                Image::make(__('moonshine.fields.about_image'), 'about_image'),
                TinyMce::make(__('moonshine.fields.about_text'), 'about_text')
                    ->addOption('file_manager', 'laravel-filemanager'),
                Text::make(__('moonshine.fields.about_btn_title'), 'about_btn_title'),
                Text::make(__('moonshine.fields.about_btn_url'), 'about_btn_url'),
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

            Text::make(__('moonshine.fields.form_title'), 'form_title'),
            Text::make(__('moonshine.fields.form_text'), 'form_text'),
            Image::make(__('moonshine.fields.about_image'), 'about_image'),
            TinyMce::make(__('moonshine.fields.about_text'), 'about_text')
                ->addOption('file_manager', 'laravel-filemanager'),
            Text::make(__('moonshine.fields.about_btn_title'), 'about_btn_title'),
            Text::make(__('moonshine.fields.about_btn_url'), 'about_btn_url'),
            Text::make(__('moonshine.fields.adv_text'), 'adv_text'),
        ];
    }

    /**
     * @param MainPageSetting $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
