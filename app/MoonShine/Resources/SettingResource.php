<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setting;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Json;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<Setting>
 */
class SettingResource extends ModelResource
{
    protected string $model = Setting::class;

    protected string $title = 'Settings';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make(__('moonshine.fields.email'), 'email'),
            Json::make(__('moonshine.fields.phones'), 'phones')
                ->fields([
                    Text::make(__('moonshine.fields.phone'),'phone'),
                ]),
            Textarea::make(__('moonshine.fields.address'), 'address'),
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
                Image::make(__('moonshine.fields.logo'), 'logo'),
                Image::make(__('moonshine.fields.slogan_image'), 'slogan_image'),
                Text::make(__('moonshine.fields.slogan_text'), 'slogan_text'),
                Text::make(__('moonshine.fields.email'), 'email'),
                Json::make(__('moonshine.fields.phones'), 'phones')
                    ->fields([
                        Text::make(__('moonshine.fields.phone'),'phone'),
                    ]),
                Textarea::make(__('moonshine.fields.address'), 'address'),
                Textarea::make(__('moonshine.fields.footer_text'), 'footer_text'),
                Textarea::make(__('moonshine.fields.copyright_text'), 'copyright_text'),
                Textarea::make(__('moonshine.fields.metric_head'), 'metric_head'),
                Textarea::make(__('moonshine.fields.metric_body'), 'metric_body'),
                Textarea::make(__('moonshine.fields.metric_footer'), 'metric_footer'),

                Text::make(__('moonshine.fields.adv_text'), 'adv_text'),
                Text::make(__('moonshine.fields.footer_text_left'), 'footer_text_left'),
                Text::make(__('moonshine.fields.footer_text_right'), 'footer_text_right'),

                Text::make(__('moonshine.fields.catalog_h1'), 'catalog_h1'),
                Number::make(__('moonshine.fields.catalog_quantity_word'), 'catalog_quantity_word'),

                Json::make(__('moonshine.fields.worktime'), 'worktimes')
                    ->fields([
                        Text::make(__('moonshine.fields.worktime'),'worktime'),
                    ]),
                Text::make(__('moonshine.fields.map'), 'map')->nullable(),
                Text::make(__('moonshine.fields.coordinates'), 'coordinates')->nullable(),
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

            Image::make(__('moonshine.fields.logo'), 'logo'),
            Image::make(__('moonshine.fields.slogan_image'), 'slogan_image'),
            Text::make(__('moonshine.fields.slogan_text'), 'slogan_text'),
            Text::make(__('moonshine.fields.email'), 'email'),
            Json::make(__('moonshine.fields.phones'), 'phones')
                ->fields([
                    Text::make(__('moonshine.fields.phone'),'phone'),
                ]),
            Textarea::make(__('moonshine.fields.address'), 'address'),
            Textarea::make(__('moonshine.fields.copyright_text'), 'copyright_text'),
            Textarea::make(__('moonshine.fields.metric_head'), 'metric_head'),
            Textarea::make(__('moonshine.fields.metric_body'), 'metric_body'),
            Textarea::make(__('moonshine.fields.metric_footer'), 'metric_footer'),
        ];
    }

    /**
     * @param Setting $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
