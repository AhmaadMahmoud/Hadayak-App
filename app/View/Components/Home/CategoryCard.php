<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryCard extends Component
{
    public function __construct(
        public string $label,
        public ?string $image = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.home.category-card');
    }
}
