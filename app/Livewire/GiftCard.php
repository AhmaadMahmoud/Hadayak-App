<?php

namespace App\Livewire;

use App\Services\Api;
use App\Services\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class GiftCard extends Component
{
    public string $heading = 'بطاقة المعايدة';

    public int $price = 50;

    public int $cartCount = 0;

    public ?int $selected = null;

    public string $message = 'واحشني اوي ياسطا الهدية دي بمناسبة نجاحك لو عاوز اي حاجة قولي.';

    /** @var list<array{id: int|null, name: string, image: string|null}> */
    public array $cards = [];

    public function mount(): void
    {
        $this->cartCount = Cart::count();
        $data = Api::get('/cards');

        if ($data) {
            $this->cards = collect($data['cards'] ?? [])->map(fn ($c) => [
                'id' => $c['id'],
                'name' => $c['name'],
                'price' => (float) $c['price'],
                'image' => $c['image'] ?? asset('images/cards/card-white.webp'),
            ])->all();
            $this->price = (int) ($data['cards'][0]['price'] ?? 50);
            $this->message = Cart::cardMessage() ?? $this->message;

            return;
        }

        // fallback محلي
        $this->cards = [
            ['id' => null, 'name' => 'كارت تهنئة مزخرف', 'image' => asset('images/cards/card-decorated.webp')],
            ['id' => null, 'name' => 'كارت أبيض بوردة', 'image' => asset('images/cards/card-white.webp')],
            ['id' => null, 'name' => 'كارت أبيض بوردة', 'image' => asset('images/cards/card-white.webp')],
            ['id' => null, 'name' => 'كارت أبيض بوردة', 'image' => asset('images/cards/card-white.webp')],
        ];
    }

    public function select(int $index): void
    {
        $this->selected = $this->selected === $index ? null : $index;
    }

    /** كمل: بيحفظ الكارت (أو من غيره) وبيوديك للعناوين */
    public function continueToAddresses()
    {
        $card = $this->selected !== null ? ($this->cards[$this->selected] ?? null) : null;

        Cart::setCard(
            $card['id'] ?? null,
            (float) ($card['price'] ?? 0),
            $card ? trim($this->message) : null,
        );

        return $this->redirect(route('addresses'), navigate: true);
    }

    #[Layout('components.layouts.app')]
    #[Title('بطاقة المعايدة')]
    public function render()
    {
        return view('livewire.gift-card');
    }
}
