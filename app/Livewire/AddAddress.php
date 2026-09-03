<?php

namespace App\Livewire;

use App\Services\Api;
use App\Services\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AddAddress extends Component
{
    public string $heading = 'اضافة عنوان جديد';

    public int $cartCount = 0;

    /** 'me' = التوصيل لي, 'gift' = التوصيل كهدية */
    public string $deliveryType = 'me';

    public string $recipientName = '';

    public string $recipientPhone = '';

    public string $area = '';

    public string $street = '';

    public string $building = '';

    public string $floor = '';

    public string $apartment = '';

    public string $landmark = '';

    public ?string $error = null;

    public function mount()
    {
        $this->cartCount = Cart::count();

        if (! session('token')) {
            return $this->redirect(route('login'), navigate: true);
        }

        $this->deliveryType = Cart::deliveryType();
    }

    public function setType(string $type): void
    {
        if (in_array($type, ['me', 'gift'], true)) {
            $this->deliveryType = $type;
        }
    }

    public function submit()
    {
        $this->error = null;

        $this->validate(
            [
                'street' => 'required',
                'recipientName' => $this->deliveryType === 'gift' ? 'required' : 'nullable',
                'recipientPhone' => $this->deliveryType === 'gift' ? 'required' : 'nullable',
            ],
            [
                'street.required' => 'اكتب الشارع على الأقل',
                'recipientName.required' => 'اكتب اسم المستلم — الهدية رايحة لمين؟',
                'recipientPhone.required' => 'اكتب رقم موبايل المستلم',
            ],
        );

        $response = Api::post('/addresses', [
            'label' => 'home',
            'area' => $this->area ?: 'القاهرة',
            'street' => $this->street,
            'building' => $this->building ?: null,
            'floor' => $this->floor ?: null,
            'apartment' => $this->apartment ?: null,
            'landmark' => $this->landmark ?: null,
            'phone' => $this->recipientPhone ?: (session('user')['phone'] ?? null),
        ], session('token'));

        if (! $response || ! isset($response['address'])) {
            $this->error = $response['message'] ?? 'مش قادرين نحفظ العنوان، جرب تاني';

            return;
        }

        // حفظ اختيارات التوصيل والعنوان الجديد في السلة
        Cart::setAddress($response['address']['id']);
        Cart::setDelivery(
            $this->deliveryType,
            $this->deliveryType === 'gift' ? $this->recipientName : null,
            $this->deliveryType === 'gift' ? $this->recipientPhone : null,
        );

        return $this->redirect(route('payment'), navigate: true);
    }

    #[Layout('components.layouts.app')]
    #[Title('اضافة عنوان جديد')]
    public function render()
    {
        return view('livewire.add-address');
    }
}
