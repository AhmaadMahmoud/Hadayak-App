<?php

namespace App\Livewire;

use App\Services\Api;
use App\Services\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class GiftWrap extends Component
{
    public string $heading = 'غلف هديتك';

    public int $price = 100;

    public int $cartCount = 0;

    public ?int $selected = null;

    /** @var list<array{id: int|null, name: string, image: string|null}> */
    public array $options = [];

    public function mount(): void
    {
        $this->cartCount = Cart::count();
        $data = Api::get('/wraps');

        if ($data) {
            $this->options = collect($data['wraps'] ?? [])->map(fn ($w) => [
                'id' => $w['id'],
                'name' => $w['name'],
                'price' => (float) $w['price'],
                'image' => $w['image'] ?? asset('images/wrap/box-blue.webp'),
            ])->all();
            $this->price = (int) ($data['wraps'][0]['price'] ?? 100);
            $this->restoreSelection();

            return;
        }

        // fallback محلي
        $this->options = array_fill(0, 6, [
            'id' => null,
            'name' => 'تغليف أزرق بفيونكة',
            'price' => 100.0,
            'image' => asset('images/wrap/box-blue.webp'),
        ]);

        $this->restoreSelection();
    }

    public function select(int $index): void
    {
        $this->selected = $this->selected === $index ? null : $index;

        $option = $this->selected !== null ? ($this->options[$this->selected] ?? null) : null;
        Cart::setWrap($option['id'] ?? null, (float) ($option['price'] ?? 0));
    }

    private function restoreSelection(): void
    {
        $savedId = Cart::wrapId();

        if ($savedId !== null) {
            $index = collect($this->options)->search(fn ($o) => $o['id'] === $savedId);
            $this->selected = $index === false ? null : $index;
        }
    }

    #[Layout('components.layouts.app')]
    #[Title('غلف هديتك')]
    public function render()
    {
        return view('livewire.gift-wrap');
    }
}
