<?php

namespace App\View\Components\Blocks;

use App\Models\Advantage;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Advantages extends Component
{
    public function render(): View|Closure|string
    {
        $advantages = Advantage::query()->list()->get();
        return view('components.blocks.advantages',['advantages' => $advantages]);
    }
}
