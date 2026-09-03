<?php

namespace App\Livewire;

use App\Services\Api;
use App\Services\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Addresses extends Component
{
    public string $heading = 'العناوين المحفوظة';

    public int $cartCount = 0;

    public ?int $selectedId = null;

    /** @var list<array<string, mixed>> */
    public array $addresses = [];

    public function mount()
    {
        $this->cartCount = Cart::count();

        if (! session('token')) {
            return $this->redirect(route('login'), navigate: true);
        }

        $data = Api::get('/addresses', [], session('token'));
        $this->addresses = $data['addresses'] ?? [];

        // العنوان المختار سابقًا أو الافتراضي أو الأول
        $this->selectedId = Cart::addressId()
            ?? collect($this->addresses)->firstWhere('is_default', true)['id']
            ?? ($this->addresses[0]['id'] ?? null);
    }

    public function select(int $id): void
    {
        $this->selectedId = $id;
        Cart::setAddress($id);
    }

    public function continueToPayment()
    {
        if ($this->selectedId === null) {
            return $this->redirect(route('add-address'), navigate: true);
        }

        Cart::setAddress($this->selectedId);

        return $this->redirect(route('payment'), navigate: true);
    }

    #[Layout('components.layouts.app')]
    #[Title('العناوين المحفوظة')]
    public function render()
    {
        return view('livewire.addresses');
    }
}
