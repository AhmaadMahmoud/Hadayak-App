<?php

namespace App\Livewire;

use App\Services\Api;
use App\Services\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class Products extends Component
{
    #[Url(as: 'category_id')]
    public ?int $categoryId = null;

    #[Url(as: 'name')]
    public ?string $categoryName = null;

    public string $heading = 'المنتجات';

    public int $cartCount = 0;

    /** @var list<array{id: int|null, name: string, price: float|int, image: string|null}> */
    public array $products = [];

    public function mount(): void
    {
        $this->cartCount = Cart::count();
        $this->heading = $this->categoryName ?: 'المنتجات';

        $data = Api::get('/products', array_filter(['category_id' => $this->categoryId]));

        if ($data) {
            $this->products = collect($data['products'] ?? [])->map(fn ($p) => [
                'id' => $p['id'],
                'name' => $p['name'],
                'price' => $p['price'],
                'image' => $p['image'],
            ])->all();

            return;
        }

        // fallback محلي
        $this->products = array_fill(0, 6, [
            'id' => null,
            'name' => 'ساعة سمارت',
            'price' => 1920,
            'image' => asset('images/products/watch.png'),
        ]);
    }

    public function addToCart(int $productId): void
    {
        $product = collect($this->products)->firstWhere('id', $productId);

        if ($product) {
            Cart::add($product['id'], $product['name'], (float) $product['price'], $product['image']);
            $this->cartCount = Cart::count();

            $this->dispatch('toast', title: 'اتضاف للبوكس 🎁', detail: $product['name']);
        }
    }

    #[Layout('components.layouts.app')]
    #[Title('المنتجات')]
    public function render()
    {
        return view('livewire.products');
    }
}
