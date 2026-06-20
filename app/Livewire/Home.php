<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    /** @var list<array{label: string, image: string|null}> */
    public array $categories = [
        ['label' => 'ألعاب أولاد', 'image' => 'category-boys-toys.png'],
        ['label' => 'ألعاب بنات', 'image' => 'category-girls-toys.jpg'],
        ['label' => 'هدايا نسائية', 'image' => null],
        ['label' => 'هدايا رجالية', 'image' => 'category-mens-gifts.jpg'],
        ['label' => 'زهور طبيعية', 'image' => null],
        ['label' => 'فخار ومجات', 'image' => null],
        ['label' => 'إلكترونيات', 'image' => null],
        ['label' => 'عطور', 'image' => 'category-perfumes.jpg'],
        ['label' => 'دباديب', 'image' => null],
    ];

    /** @var list<array{label: string}> */
    public array $services = [
        ['label' => 'عمل تيشرت مخصص'],
        ['label' => 'عمل مج مخصص'],
        ['label' => 'عمل ستيكر مخصص'],
    ];

    #[Layout('components.layouts.app')]
    #[Title('هداياك')]
    public function render()
    {
        return view('livewire.home');
    }
}
