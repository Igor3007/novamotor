<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Category;
use App\Models\Faq;
use App\Models\MenuItem;
use App\Models\Product;
use App\Models\ProductTile;
use App\Models\Property;
use App\Models\Setting;
use App\Models\SocialService;
use Illuminate\Support\Facades\DB;
use Leeto\Seo\Seo;

class CatalogController extends Controller
{
    public function index()
    {

        $settings = Setting::query()->first();

        $menu = MenuItem::query()->tree();

        $categories = Category::query()->catalog()->get();

        $advantages = Advantage::query()->list()->get();

        $faqs = Faq::query()->catalog()->get();

        $socialServices = SocialService::query()->active()->orderBy('sorting')->get();

        $h1 = '';

        if(Seo::meta()->model()->id && Seo::meta()->model()->h1) {
            $h1 = Seo::meta()->model()->h1;
        }

        return view('layouts.nova-motors.catalog', compact(
            'settings',
            'menu',
            'categories',
            'advantages',
            'faqs',
            'socialServices',
            'h1'
        ));
    }

    public function category(string $slug) {
        $category = Category::query()->where('slug','=',$slug)->active()->firstOrFail();
        $categories = Category::query()->catalog()->get();

        $settings = Setting::query()->first();

        $menu = MenuItem::query()->tree();

        $faqs = Faq::query()->category($category)->get();

        $products = Product::query()
            ->with('categoryProperties','properties')
            ->where('category_id','=',$category->id)
            ->orderBy('sorting')
            ->active()
            ->get();


        $properties = Property::query()->category()->get();

        $socialServices = SocialService::query()->active()->orderBy('sorting')->get();

        if(Seo::meta()->model()->id && Seo::meta()->model()->h1) {
            $h1 = Seo::meta()->model()->h1;
        }
        else{
            $h1 = $category->title;
        }

        if(!Seo::meta()->model()->id) {
            seo()->title($category->title);
        }

        if(seo()->meta()->text()) {
            $category->seo_block_description = seo()->meta()->text();
        }

        return view('layouts.nova-motors.category', compact(
            'category',
            'categories',
            'settings',
            'menu',
            'faqs',
            'properties',
            'products',
            'socialServices',
            'h1'
        ));
    }

    public function product(string $slug) {
        $product = Product::query()->where('slug','=',$slug)->active()->firstOrFail();
        $categories = Category::query()->catalog()->get();

        $settings = Setting::query()->first();

        $menu = MenuItem::query()->tree();

        $faqs = Faq::query()->product($product)->get();

        $advantages = Advantage::query()->list()->get();

        $analogProducts = $product->analogProducts;

        $tiles = ProductTile::query()->active()->orderBy('sorting')->get();

        $socialServices = SocialService::query()->active()->orderBy('sorting')->get();



        if(Seo::meta()->model()->id && Seo::meta()->model()->h1) {
            $h1 = Seo::meta()->model()->h1;
        }
        else {
            $h1 = $product->full_title ?? $product->title;
        }


        if(!Seo::meta()->model()->id) {
            seo()->title($product->title);
        }

        return view('layouts.nova-motors.product', compact(
            'product',
            'categories',
            'settings',
            'menu',
            'faqs',
            'advantages',
            'analogProducts',
            'tiles',
            'socialServices',
            'h1'
        ));
    }
}
