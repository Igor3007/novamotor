<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\HowBuyBlock;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;
use Sweet1s\MoonshineFileManager\FileManager;
use Sweet1s\MoonshineFileManager\FileManagerTypeEnum;

/**
 * @extends ModelResource<HowBuyBlock>
 */
class HowBuyBlockResource extends ModelResource
{
    protected string $model = HowBuyBlock::class;

    protected string $title = 'HowBuyBlocks';

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
                    ->required(),

                TinyMce::make(__('moonshine.fields.text'), 'text')
                    ->addOption('file_manager', 'laravel-filemanager')
                    ->required(),

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
            Text::make(__('moonshine.fields.title'), 'title')
                ->required(),

            TinyMce::make(__('moonshine.fields.text'), 'text')
                ->addOption('file_manager', 'laravel-filemanager')
                ->required(),

            Number::make(__('moonshine.fields.sorting'),'sorting')
                ->default(0),
            Switcher::make(__('moonshine.fields.active'),'active'),
        ];
    }

    /**
     * @param HowBuyBlock $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
