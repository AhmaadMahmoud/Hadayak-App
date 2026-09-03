<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Intro extends Component
{
    #[Layout('components.layouts.app')]
    #[Title('هداياك')]
    public function mount(): void
    {
        $destination = session('token') ? '/home' : '/login';
        $this->js("setTimeout(() => window.location.replace('{$destination}'), 2000)");
    }

    public function render()
    {
        return view('livewire.intro');
    }
}
