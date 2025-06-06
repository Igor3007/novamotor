<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use MoonShine\Laravel\Fields\Slug;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Menu>
 */
class MenuResource extends ModelResource
{
    protected string $model = Menu::class;

    protected string $column = 'title';

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
                Text::make(__('moonshine.fields.title'), 'title')
                    ->required(),
                Slug::make(__('moonshine.fields.slug'),'slug')
                    ->from('title')
                    ->required()
                    ->unique(),
                BelongsToMany::make('moonshine.resource.menu-item','items', resource: MenuItemResource::class)
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
        ];
    }

    /**
     * @param Menu $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
