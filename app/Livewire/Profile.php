<?php

namespace App\Livewire;

use App\Services\Api;
use App\Services\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    public int $cartCount = 0;

    public ?array $user = null;

    public function mount(): void
    {
        $this->cartCount = Cart::count();
        $this->user = session('user');
    }

    public function logout()
    {
        if (session('token')) {
            Api::post('/auth/logout', [], session('token'));
        }

        session()->forget(['token', 'user']);

        return $this->redirect(route('login'), navigate: true);
    }

    #[Layout('components.layouts.app')]
    #[Title('حسابي')]
    public function render()
    {
        return view('livewire.profile');
    }
}
