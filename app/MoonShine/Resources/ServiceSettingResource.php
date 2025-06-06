<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceSetting;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<ServiceSetting>
 */
class ServiceSettingResource extends ModelResource
{
    protected string $model = ServiceSetting::class;

    protected string $title = 'ServiceSettings';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make(__('moonshine.fields.service_partner'), 'service_partner'),
            Text::make(__('moonshine.fields.service_address'), 'service_address'),
            Image::make(__('moonshine.fields.image'), 'image'),
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
                Text::make(__('moonshine.fields.service_partner'), 'service_partner'),
                Text::make(__('moonshine.fields.service_address'), 'service_address'),
                Image::make(__('moonshine.fields.image'), 'image'),
                TinyMce::make(__('moonshine.fields.service_text1'), 'text1')
                    ->addOption('file_manager', 'laravel-filemanager'),
                TinyMce::make(__('moonshine.fields.service_text2'), 'text2')
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
            Text::make(__('moonshine.fields.service_partner'), 'service_partner'),
            Text::make(__('moonshine.fields.service_address'), 'service_address'),
            Image::make(__('moonshine.fields.image'), 'image'),
            TinyMce::make(__('moonshine.fields.service_text1'), 'text1')
                ->addOption('file_manager', 'laravel-filemanager'),
            TinyMce::make(__('moonshine.fields.service_text2'), 'text2')
                ->addOption('file_manager', 'laravel-filemanager'),
        ];
    }

    /**
     * @param ServiceSetting $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
