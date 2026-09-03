<?php

namespace App\Livewire;

use App\Services\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class GiftBox extends Component
{
    public string $heading = 'بوكس الهدايا';

    public int $cartCount = 0;

    /** @var array<int, array{id: int, name: string, price: float, image: string|null, qty: int}> */
    public array $items = [];

    public function mount(): void
    {
        $this->refreshCart();
    }

    public function increment(int $id): void
    {
        Cart::increment($id);
        $this->refreshCart();
    }

    public function decrement(int $id): void
    {
        Cart::decrement($id);
        $this->refreshCart();
    }

    public function remove(int $id): void
    {
        Cart::remove($id);
        $this->refreshCart();
    }

    private function refreshCart(): void
    {
        $this->items = array_values(Cart::items());
        $this->cartCount = Cart::count();
    }

    #[Layout('components.layouts.app')]
    #[Title('بوكس الهدايا')]
    public function render()
    {
        return view('livewire.gift-box');
    }
}
