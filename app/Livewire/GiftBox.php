<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class GiftBox extends Component
{
    public string $heading = 'بوكس الهدايا';

    public int $cartCount = 2;

    /** @var list<array{name: string, price: int, qty: int, image: string|null}> */
    public array $items = [
        ['name' => 'ساعة سمارت', 'price' => 1920, 'qty' => 2, 'image' => 'watch.png'],
        ['name' => 'ساعة سمارت', 'price' => 1920, 'qty' => 2, 'image' => 'watch.png'],
        ['name' => 'ساعة سمارت', 'price' => 1920, 'qty' => 2, 'image' => 'watch.png'],
    ];

    public function increment(int $index): void
    {
        if (isset($this->items[$index])) {
            $this->items[$index]['qty']++;
        }
    }

    public function decrement(int $index): void
    {
        if (isset($this->items[$index]) && $this->items[$index]['qty'] > 1) {
            $this->items[$index]['qty']--;
        }
    }

    #[Layout('components.layouts.app')]
    #[Title('بوكس الهدايا')]
    public function render()
    {
        return view('livewire.gift-box');
    }
}
