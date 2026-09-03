<?php

namespace App\Livewire;

use App\Services\Api;
use App\Services\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class MyOrders extends Component
{
    public string $heading = 'طلباتي';

    public int $cartCount = 0;

    /** @var list<array<string, mixed>> */
    public array $orders = [];

    public bool $offline = false;

    public function mount()
    {
        $this->cartCount = Cart::count();
        if (! session('token')) {
            return $this->redirect(route('login'), navigate: true);
        }

        $data = Api::get('/orders', [], session('token'));

        if ($data === null) {
            $this->offline = true;

            return;
        }

        $this->orders = collect($data['orders'] ?? [])->map(fn ($o) => [
            'number' => $o['number'],
            'status' => $o['status'],
            'status_label' => $o['status_label'],
            'total' => $o['total'],
            'items_count' => collect($o['items'])->sum('qty'),
            'date' => \Carbon\Carbon::parse($o['created_at'])->translatedFormat('d M Y'),
        ])->all();
    }

    #[Layout('components.layouts.app')]
    #[Title('طلباتي')]
    public function render()
    {
        return view('livewire.my-orders');
    }
}
