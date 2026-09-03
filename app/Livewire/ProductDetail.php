<?php

namespace App\Livewire;

use App\Services\Api;
use App\Services\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProductDetail extends Component
{
    public string $heading = 'تفاصيل المنتج';

    public int $cartCount = 0;

    public ?int $productId = null;

    public string $name = '';

    public float $price = 0;

    public ?string $image = null;

    public string $description = '';

    /** @var list<array{id: int|null, name: string, image: string|null}> */
    public array $related = [];

    public function mount(int $id = 0): void
    {
        $this->cartCount = Cart::count();
        $this->productId = $id ?: null;

        $data = $id ? Api::get('/products/'.$id) : null;

        if ($data && isset($data['product'])) {
            $p = $data['product'];
            $this->name = $p['name'];
            $this->price = $p['price'];
            $this->image = $p['images'][0] ?? $p['image'] ?? null;
            $this->description = $p['description'] ?? '';
            $this->heading = 'قسم '.($p['category']['name'] ?? '');

            $this->related = collect($data['related'] ?? [])->map(fn ($r) => [
                'id' => $r['id'],
                'name' => $r['name'],
                'image' => $r['image'],
            ])->all();

            return;
        }

        // fallback محلي
        $this->name = 'ساعة سمارت';
        $this->price = 1920;
        $this->image = asset('images/products/watch.png');
        $this->heading = 'قسم الإلكترونيات';
        $this->description = 'تتميز ساعة Hoco Y31 الذكية المزودة بخاصية الاتصال عبر البلوتوث بشاشة لمس HD مقاس 1.46 بوصة بدقة 360×360 بكسل، مما يوفر عرضًا واضحًا للتفاصيل واستجابة لمس سلسة. يأتي التصميم بواجهة دائرية أنيقة تمنح الساعة مظهرًا عصريًا وجذابًا، مع سهولة قراءة الإشعارات والبيانات الصحية والرياضية واستخدام الوظائف الذكية المختلفة طوال اليوم.';
        $this->related = array_fill(0, 4, ['id' => null, 'name' => 'ساعة سمارت', 'image' => null]);
    }

    public function addToCart(): void
    {
        if ($this->productId) {
            Cart::add($this->productId, $this->name, (float) $this->price, $this->image);
            $this->cartCount = Cart::count();

            $this->dispatch('toast', title: 'اتضاف للبوكس 🎁', detail: $this->name);
        }
    }

    public function addRelated(int $productId): void
    {
        $data = Api::get('/products/'.$productId);

        if ($data && isset($data['product'])) {
            $p = $data['product'];
            Cart::add($p['id'], $p['name'], (float) $p['price'], $p['image'] ?? ($p['images'][0] ?? null));
            $this->cartCount = Cart::count();

            $this->dispatch('toast', title: 'اتضاف للبوكس 🎁', detail: $p['name']);
        }
    }

    #[Layout('components.layouts.app')]
    #[Title('تفاصيل المنتج')]
    public function render()
    {
        return view('livewire.product-detail');
    }
}
