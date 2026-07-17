<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    public string $location = 'التوصيل إلى المعادي';

    public int $cartCount = 2;

    /** @var list<array{label: string, image: string|null}> */
    public array $categories = [
        ['label' => 'ألعاب أولاد', 'image' => 'cat-boys-toys.png'],
        ['label' => 'ألعاب بنات', 'image' => 'cat-girls-toys.png'],
        ['label' => 'هدايا نسائية', 'image' => 'cat-womens-gifts.png'],
        ['label' => 'هدايا رجالية', 'image' => 'cat-mens-gifts.png'],
        ['label' => 'زهور طبيعية', 'image' => 'cat-flowers.png'],
        ['label' => 'فخار ومجات', 'image' => 'cat-pottery-mugs.png'],
        ['label' => 'إلكترونيات', 'image' => 'cat-electronics.png'],
        ['label' => 'عطور', 'image' => 'cat-perfumes.png'],
        ['label' => 'دباديب', 'image' => 'cat-teddy.png'],
    ];

    /** @var list<array{label: string, image: string}> */
    public array $services = [
        ['label' => 'عمل تيشرت مخصص', 'image' => 'service-tshirt.png'],
        ['label' => 'عمل مج مخصص', 'image' => 'service-mug.png'],
        ['label' => 'عمل ستيكر مخصص', 'image' => 'service-sticker.png'],
    ];

    #[Layout('components.layouts.app')]
    #[Title('هداياك')]
    public function render()
    {
        return view('livewire.home');
    }
}
