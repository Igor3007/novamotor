<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AboutSetting;
use App\Models\Advantage;
use App\Models\Banner;
use App\Models\Category;
use App\Models\DocumentGroup;
use App\Models\Faq;
use App\Models\HowBuyBlock;
use App\Models\MainPageSetting;
use App\Models\MenuItem;
use App\Models\ObjectModel;
use App\Models\Page;
use App\Models\PolicyBlock;
use App\Models\ServiceSetting;
use App\Models\Setting;
use App\Models\SocialService;
use App\Models\Specialization;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Leeto\Seo\Seo;

class PageController extends Controller
{
    public function home(): View
    {
        $settings = Setting::query()->first();
        $mainPageSettings = MainPageSetting::query()->first();

        $menu = MenuItem::query()->with('menu')
            ->orderBy('sorting')
            ->get()->tree();

        $categories = Category::query()
//            ->with('products')
            ->active()->get();
//        foreach ($categories as &$category) {
//            $category->products = $category->products->take(20);
//        }

        $banners = Banner::query()->active()->orderBy('sorting')->get();

        $advantages = Advantage::query()->orderBy('sorting')->where('active', 1)->get();

        $socialServices = SocialService::query()->active()->orderBy('sorting')->get();

        return view('layouts.nova-motors.home', compact(
            'settings',
            'menu',
            'categories',
            'banners',
            'advantages',
            'mainPageSettings',
            'socialServices',
        ));
    }

    public function page(string $slug): View
    {
        $page = Page::query()->where('slug','=',$slug)->active()->firstOrFail();

        $settings = Setting::query()->first();
        $menu = MenuItem::query()->with('menu')
            ->orderBy('sorting')
            ->get()->tree();

        $categories = Category::query()->with('products')->active()->get();
        $socialServices = SocialService::query()->active()->orderBy('sorting')->get();



        $data = [
            'page' => $page,
            'settings' => $settings,
            'menu' => $menu,
            'categories' => $categories,
            'socialServices' => $socialServices,
            'h1' => Seo::meta()->model()->id && Seo::meta()->model()->h1 ? Seo::meta()->model()->h1 : $page->title
        ];

        switch ($slug) {
            case 'how-to-buy':
                $template = 'layouts.nova-motors.pages.how-to-buy';
                $data['blocks'] = HowBuyBlock::query()->active()->orderBy('sorting')->get();
                break;
            case 'service':
                $template = 'layouts.nova-motors.pages.service';
                $data['service'] = ServiceSetting::query()->first();
                break;
            case 'about':
                $template = 'layouts.nova-motors.pages.about';
                $data['about'] = AboutSetting::query()->first();
                $data['advantages'] = Advantage::query()->orderBy('sorting')->where('active', 1)->get();
                $data['specializations'] = Specialization::query()->active()->orderBy('sorting')->get();
                break;
            case 'contacts':
                $template = 'layouts.nova-motors.pages.contacts';
                break;
            case 'docs':
                $data['documentGroups'] = DocumentGroup::query()->with('documents')->active()->orderBy('sorting')->get();
                $template = 'layouts.nova-motors.pages.docs';
                break;
            case 'objects':
                $data['objects'] = ObjectModel::query()->active()->orderBy('sorting')->get();
                $data['faqs'] = Faq::query()->objects()->get();
                $template = 'layouts.nova-motors.pages.objects';
                break;
            case 'vacancies':
                $data['vacancies'] = Vacancy::query()->active()->orderBy('sorting')->get();
                $template = 'layouts.nova-motors.pages.vacancies';
                break;
            case 'policy':
                $data['blocks'] = PolicyBlock::query()->active()->orderBy('sorting')->get();
                $template = 'layouts.nova-motors.pages.policy';
                break;
            default:
                $template = 'layouts.nova-motors.pages.default';
        }

        if(!Seo::meta()->model()->id) {
            seo()->title($page->title);
        }

        return view($template, $data);
    }
}
