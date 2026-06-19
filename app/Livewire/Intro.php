<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Intro extends Component
{
    #[Layout('components.layouts.app')]
    #[Title('هداياك')]
    public function render()
    {
        return view('livewire.intro');
    }
}
