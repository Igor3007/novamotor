<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use MoonShine\Laravel\Fields\Slug;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\PageType;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Json;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

/**
 * @extends ModelResource<Product>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Products';

    protected array $with = ['category'];

    protected function search(): array
    {
        return ['title'];
    }
    protected ?PageType $redirectAfterSave = PageType::FORM;
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make(__('moonshine.fields.title'), 'title')
                ->required()->sortable(),
            Slug::make(__('moonshine.fields.slug'), 'slug')
                ->from('title')
                ->unique(),
            BelongsTo::make(
                __('moonshine.resource.categories'),
                'category',
                'title',
                resource: CategoryResource::class
            ),
            Number::make(__('moonshine.fields.quantity'), 'quantity')
                ->default(0),

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

                Text::make(__('moonshine.fields.full_title'), 'full_title'),
                Slug::make(__('moonshine.fields.slug'), 'slug')
                    ->from('title')
                    ->unique(),

                BelongsTo::make(
                    __('moonshine.resource.categories'),
                    'category',
                    'title',
                    resource: CategoryResource::class
                ),

                TinyMce::make(__('moonshine.fields.description'), 'description')
                    ->addOption('file_manager', 'laravel-filemanager'),
                TinyMce::make(__('moonshine.fields.full_description'), 'full_description')
                    ->addOption('file_manager', 'laravel-filemanager'),
                TinyMce::make(__('moonshine.fields.sizes'), 'sizes')
                    ->addOption('file_manager', 'laravel-filemanager'),
                TinyMce::make(__('moonshine.fields.documentation'), 'documentation')
                    ->addOption('file_manager', 'laravel-filemanager'),

                BelongsToMany::make(
                    __('moonshine.fields.files'),
                    'files','name',
                    resource: ProductFileResource::class
                ),


                Json::make(__('moonshine.fields.analogs'), 'analogs')
                    ->fields([
                        Select::make(__('moonshine.fields.product'), 'product_id')
                            ->options(Product::query()->pluck('title', 'id')->all())
                            ->nullable()
                            ->searchable()
                    ]),


                Number::make(__('moonshine.fields.quantity'), 'quantity')
                    ->default(0),

                File::make(__('moonshine.fields.tech_list'), 'tech_list')->removable(),
                Image::make(__('moonshine.fields.tech_list_photo'), 'tech_list_photo')->removable(),

                MediaLibrary::make(__('moonshine.fields.photo'), 'default')->multiple()->nullable()->removable(),

                Number::make(__('moonshine.fields.sorting'), 'sorting')
                    ->default(0),

                Switcher::make(__('moonshine.fields.active'), 'active'),

                BelongsToMany::make(__('moonshine.resource.properties'), 'properties', 'title')
                    ->nullable()
                    ->fields([
                        Text::make(__('moonshine.fields.value'), 'value'),
                    ]),
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

            Text::make(__('moonshine.fields.full_title'), 'full_title'),
            Slug::make(__('moonshine.fields.slug'), 'slug')
                ->from('title')
                ->unique(),

            BelongsTo::make(
                __('moonshine.resource.categories'),
                'category',
                'title',
                resource: CategoryResource::class
            ),

            TinyMce::make(__('moonshine.fields.description'), 'description')
                ->addOption('file_manager', 'laravel-filemanager'),
            TinyMce::make(__('moonshine.fields.full_description'), 'full_description')
                ->addOption('file_manager', 'laravel-filemanager'),
            TinyMce::make(__('moonshine.fields.sizes'), 'sizes')
                ->addOption('file_manager', 'laravel-filemanager'),
            TinyMce::make(__('moonshine.fields.documentation'), 'documentation')
                ->addOption('file_manager', 'laravel-filemanager'),

            Json::make(__('moonshine.fields.analogs'), 'analogs')
                ->fields([
                    Select::make(__('moonshine.fields.product'), 'product_id')
                        ->options(Product::query()->pluck('title', 'id')->all())
                        ->nullable()
                        ->searchable()
                ]),


            Number::make(__('moonshine.fields.quantity'), 'quantity')
                ->default(0),

            File::make(__('moonshine.fields.tech_list'), 'tech_list'),


            MediaLibrary::make(__('moonshine.fields.photo'), 'default')->multiple()->nullable(),

            Number::make(__('moonshine.fields.sorting'), 'sorting')
                ->default(0),

            Switcher::make(__('moonshine.fields.active'), 'active'),

            BelongsToMany::make(__('moonshine.resource.properties'), 'properties', 'title')
                ->nullable()
                ->fields([
                    Text::make(__('moonshine.fields.value'), 'value'),
                ]),
        ];
    }

    /**
     * @param Product $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
