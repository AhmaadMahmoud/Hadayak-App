<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Products extends Component
{
    public string $heading = 'ساعات ذكية';

    public int $cartCount = 2;

    /** @var list<array{name: string, price: int, image: string|null}> */
    public array $products = [
        ['name' => 'ساعة سمارت', 'price' => 1920, 'image' => null],
        ['name' => 'ساعة سمارت', 'price' => 1920, 'image' => null],
        ['name' => 'ساعة سمارت', 'price' => 1920, 'image' => null],
        ['name' => 'ساعة سمارت', 'price' => 1920, 'image' => null],
        ['name' => 'ساعة سمارت', 'price' => 1920, 'image' => null],
        ['name' => 'ساعة سمارت', 'price' => 1920, 'image' => null],
    ];

    #[Layout('components.layouts.app')]
    #[Title('المنتجات')]
    public function render()
    {
        return view('livewire.products');
    }
}
