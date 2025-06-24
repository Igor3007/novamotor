<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use MoonShine\Laravel\Fields\Slug;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\MenuManager\Attributes\Group;
use MoonShine\MenuManager\Attributes\Order;
use MoonShine\Support\Attributes\Icon;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;

#[Group('moonshine.resource.system', 'categories', translatable: true)]
#[Order(1)]
/**
 * @extends ModelResource<Category>
 */
class CategoryResource extends ModelResource
{
    protected string $model = Category::class;

    protected string $title = 'Categories';

    protected string $sortColumn = 'sorting';

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

            Number::make(__('moonshine.fields.sorting'), 'sorting')
                ->default(0)->sortable(),

            Switcher::make(__('moonshine.fields.active'), 'active')->sortable(),
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
                Slug::make(__('moonshine.fields.slug'), 'slug')
                    ->from('title')
                    ->unique(),
                Image::make(__('moonshine.fields.image'), 'image')
                    ->disk('public')
                    ->dir('categories'),
                Number::make(__('moonshine.fields.sorting'), 'sorting')
                    ->default(0),

                Switcher::make(__('moonshine.fields.active'), 'active'),

                TinyMce::make(__('moonshine.fields.description'), 'description')
                    ->addOption('file_manager', 'laravel-filemanager'),

                TinyMce::make(__('moonshine.fields.common_props'), 'common_props')
                    ->addOption('file_manager', 'laravel-filemanager'),

                File::make(__('moonshine.fields.price_list'), 'price_list')->removable(),
                Text::make(__('moonshine.fields.price_list_title'), 'price_list_title'),

                File::make(__('moonshine.fields.decoding_file'), 'decoding_file'),
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
            Slug::make(__('moonshine.fields.slug'), 'slug')
                ->from('title')
                ->unique(),
            Image::make(__('moonshine.fields.image'), 'image')
                ->disk('public')
                ->dir('categories'),
            Number::make(__('moonshine.fields.sorting'), 'sorting')
                ->default(0),

            Text::make(__('moonshine.fields.seo_block_title'), 'seo_block_title'),
            TinyMce::make(__('moonshine.fields.seo_block_description'), 'seo_block_description')
                ->addOption('file_manager', 'laravel-filemanager'),


            Switcher::make(__('moonshine.fields.active'), 'active')
        ];
    }

    /**
     * @param Category $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
