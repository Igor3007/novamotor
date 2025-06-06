<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\FormAnswer;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Url;

/**
 * @extends ModelResource<FormAnswer>
 */
class FormAnswerResource extends ModelResource
{
    protected string $model = FormAnswer::class;

    protected string $title = 'Form Answer';

    protected function search(): array
    {
        return ['page','form_name','phone'];
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),

            Date::make(__('moonshine.resource.created_at'), 'created_at')
                ->format("d.m.Y H:i:s")
                ->sortable(),

            Text::make(__('moonshine.fields.form_name'),'form_name')->sortable(),
            Url::make(__('moonshine.fields.page'),'page'),
            Text::make(__('moonshine.fields.phone'),'phone'),
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

                Date::make(__('moonshine.resource.created_at'), 'created_at')
                    ->format("d.m.Y H:i:s")
                    ->sortable(),

                Text::make(__('moonshine.fields.form_name'),'form_name'),
                Text::make(__('moonshine.fields.name'),'name'),
                Text::make(__('moonshine.fields.company'),'company')->nullable(),
                Text::make(__('moonshine.fields.phone'),'phone'),
                Text::make(__('moonshine.fields.email'),'email')->nullable(),
                Textarea::make(__('moonshine.fields.message'),'message')->nullable(),
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

            Date::make(__('moonshine.resource.created_at'), 'created_at')
                ->format("d.m.Y H:i:s")
                ->sortable(),

            Text::make(__('moonshine.fields.form_name'),'form_name'),
            Url::make(__('moonshine.fields.page'),'page'),
            Text::make(__('moonshine.fields.name'),'name'),
            Text::make(__('moonshine.fields.company'),'company')->nullable(),
            Text::make(__('moonshine.fields.phone'),'phone'),
            Text::make(__('moonshine.fields.email'),'email')->nullable(),
            Textarea::make(__('moonshine.fields.message'),'message')->nullable(),
        ];
    }

    /**
     * @param FormAnswer $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
