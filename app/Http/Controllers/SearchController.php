<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    public function list(Request $request): Collection
    {
        $q = $request->q;

        $items = new Collection();

        $categories = Category::query()
            ->where('title', 'like', '%' . $q . '%')->active()
            ->get()->select('title','url');

        $items = $items->merge($categories);

        $products = Product::query()
            ->where('title', 'like', '%' . $q . '%')->active()
            ->get()->select('title','url');

        $items = $items->merge($products);

        return $items;
    }
}
