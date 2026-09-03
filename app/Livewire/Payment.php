<?php

namespace App\Livewire;

use App\Services\Api;
use App\Services\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Payment extends Component
{
    public string $heading = 'الدفع';

    public int $cartCount = 0;

    public string $selected = 'card';

    /** @var list<array{id: string, label: string, note: string|null, disabled: bool}> */
    public array $methods = [];

    /** @var list<array{name: string, qty: int, price: float}> */
    public array $items = [];

    public float $itemsTotal = 0;

    public float $wrapPrice = 0;

    public float $cardPrice = 0;

    public float $delivery = 50;

    public ?string $error = null;

    public function mount()
    {
        $this->cartCount = Cart::count();

        if (! session('token')) {
            return $this->redirect(route('login'), navigate: true);
        }

        if (empty(Cart::items())) {
            return $this->redirect(route('gift-box'), navigate: true);
        }

        // ملخص الطلب من السلة الحقيقية
        $this->items = collect(Cart::items())->map(fn ($i) => [
            'name' => $i['name'],
            'qty' => $i['qty'],
            'price' => (float) $i['price'],
        ])->values()->all();

        $this->itemsTotal = Cart::itemsTotal();
        $this->wrapPrice = Cart::wrapPrice();
        $this->cardPrice = Cart::cardPrice();

        // سعر التوصيل والدفع عند الاستلام من إعدادات الداشبورد
        $config = Api::get('/config');
        $this->delivery = (float) ($config['delivery_fee'] ?? 50);
        $codEnabled = (bool) ($config['cod_enabled'] ?? false);

        $this->methods = [
            ['id' => 'card', 'label' => 'بطاقة ائتمان', 'note' => null, 'disabled' => false],
            ['id' => 'vodafone_cash', 'label' => 'دفع من خلال فودافون كاش', 'note' => null, 'disabled' => false],
            ['id' => 'instapay', 'label' => 'دفع من خلال انستا باي', 'note' => null, 'disabled' => false],
            [
                'id' => 'cod',
                'label' => 'الدفع عند الاستلام',
                'note' => $codEnabled ? null : 'غير متاح لهذا الطلب',
                'disabled' => ! $codEnabled,
            ],
        ];
    }

    public function selectMethod(string $id): void
    {
        foreach ($this->methods as $method) {
            if ($method['id'] === $id && ! $method['disabled']) {
                $this->selected = $id;

                return;
            }
        }
    }

    public function getTotalProperty(): float
    {
        return $this->itemsTotal + $this->wrapPrice + $this->cardPrice + $this->delivery;
    }

    /** اتمام الطلب — بيبعت الطلب الحقيقي للسيرفر */
    public function placeOrder()
    {
        $this->error = null;

        if (! Cart::addressId()) {
            return $this->redirect(route('addresses'), navigate: true);
        }

        $payload = [
            'items' => collect(Cart::items())->map(fn ($i) => [
                'product_id' => $i['id'],
                'qty' => $i['qty'],
            ])->values()->all(),
            'address_id' => Cart::addressId(),
            'delivery_type' => Cart::deliveryType(),
            'recipient_name' => Cart::recipientName(),
            'recipient_phone' => Cart::recipientPhone(),
            'wrap_option_id' => Cart::wrapId(),
            'card_design_id' => Cart::cardId(),
            'card_message' => Cart::cardMessage(),
            'payment_method' => $this->selected,
        ];

        $response = Api::post('/orders', $payload, session('token'));

        if (! $response) {
            $this->error = 'مش قادرين نوصل للسيرفر، جرب تاني';

            return;
        }

        if (! isset($response['order'])) {
            $this->error = $response['message']
                ?? collect($response['errors'] ?? [])->flatten()->first()
                ?? 'حصلت مشكلة في الطلب، جرب تاني';

            return;
        }

        Cart::clear();
        session()->flash('order_placed', $response['order']['number']);

        return $this->redirect(route('my-orders'), navigate: true);
    }

    #[Layout('components.layouts.app')]
    #[Title('الدفع')]
    public function render()
    {
        return view('livewire.payment');
    }
}
