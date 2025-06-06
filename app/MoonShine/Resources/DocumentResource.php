<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Document;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\HasOne;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<Document>
 */
class DocumentResource extends ModelResource
{
    protected string $model = Document::class;

    protected string $title = 'Documents';

    protected array $with = ['group'];

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

            BelongsTo::make(__('moonshine.fields.group'),'group','title', resource:DocumentGroupResource::class),

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
                BelongsTo::make(__('moonshine.fields.group'),'group','title', resource:DocumentGroupResource::class),

                Text::make(__('moonshine.fields.title'), 'title')
                    ->required(),

                File::make(__('moonshine.fields.file'),'file')->disk('public')->dir('docs')
                    ->required($this->isCreateFormPage() === true),

                Textarea::make(__('moonshine.fields.text'), 'text')
                    ->nullable(),

                Number::make(__('moonshine.fields.sorting'),'sorting')
                    ->default(0),
                Switcher::make(__('moonshine.fields.active'),'active'),
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
            BelongsTo::make(__('moonshine.fields.group'),'group','title', resource:DocumentGroupResource::class),

            Text::make(__('moonshine.fields.title'), 'title')
                ->required(),

            File::make(__('moonshine.fields.file'),'file')->disk('public')->dir('docs'),

            Textarea::make(__('moonshine.fields.text'), 'text')
                ->nullable(),

            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0),
            Switcher::make(__('moonshine.fields.active'),'active'),
        ];
    }

    /**
     * @param Document $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
