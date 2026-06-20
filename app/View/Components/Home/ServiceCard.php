<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceCard extends Component
{
    public function __construct(
        public string $label,
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.home.service-card');
    }
}
