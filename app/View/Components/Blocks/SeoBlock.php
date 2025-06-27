<?php

namespace App\View\Components\Blocks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Leeto\Seo\Seo;

class SeoBlock extends Component
{
    public function render(): View|Closure|string
    {
        $title = '';
        $text = '';
        if(Seo::meta()->model()->id) {
            $title = Seo::meta()->model()->seo_block_title;
            $text = Seo::meta()->model()->text;
        }

        return view('components.blocks.seo-block',compact('title','text'));
    }
}
