<?php

namespace App\Livewire;

use App\Services\Api;
use App\Services\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    public string $location = 'التوصيل إلى المعادي';

    public int $cartCount = 0;

    /** @var list<array{id: int|null, label: string, image: string|null}> */
    public array $categories = [];

    /** @var list<array{label: string, image: string|null}> */
    public array $services = [];

    /** صور محلية احتياطية بترتيب الأقسام */
    private const FALLBACK_CATEGORY_IMAGES = [
        'ألعاب أولاد' => 'cat-boys-toys.png',
        'ألعاب بنات' => 'cat-girls-toys.png',
        'هدايا نسائية' => 'cat-womens-gifts.png',
        'هدايا رجالية' => 'cat-mens-gifts.png',
        'زهور طبيعية' => 'cat-flowers.png',
        'فخار ومجات' => 'cat-pottery-mugs.png',
        'إلكترونيات' => 'cat-electronics.png',
        'عطور' => 'cat-perfumes.png',
        'دباديب' => 'cat-teddy.png',
    ];

    private const FALLBACK_SERVICE_IMAGES = [
        'عمل تيشرت مخصص' => 'service-tshirt.png',
        'عمل مج مخصص' => 'service-mug.png',
        'عمل ستيكر مخصص' => 'service-sticker.png',
    ];

    public function mount(): void
    {
        $this->cartCount = Cart::count();
        $data = Api::get('/home');

        if ($data) {
            $this->categories = collect($data['categories'] ?? [])->map(fn ($c) => [
                'id' => $c['id'],
                'label' => $c['name'],
                'image' => $c['image'] ?? $this->localCategoryImage($c['name']),
            ])->all();

            $this->services = collect($data['services'] ?? [])->map(fn ($s) => [
                'label' => $s['name'],
                'image' => $s['image'] ?? $this->localServiceImage($s['name']),
            ])->all();

            return;
        }

        // fallback محلي لو الباك اند مش متاح
        $this->categories = collect(self::FALLBACK_CATEGORY_IMAGES)
            ->map(fn ($img, $name) => ['id' => null, 'label' => $name, 'image' => asset('images/home/'.$img)])
            ->values()->all();

        $this->services = collect(self::FALLBACK_SERVICE_IMAGES)
            ->map(fn ($img, $name) => ['label' => $name, 'image' => asset('images/home/'.$img)])
            ->values()->all();
    }

    private function localCategoryImage(string $name): ?string
    {
        $img = self::FALLBACK_CATEGORY_IMAGES[$name] ?? null;

        return $img ? asset('images/home/'.$img) : null;
    }

    private function localServiceImage(string $name): ?string
    {
        $img = self::FALLBACK_SERVICE_IMAGES[$name] ?? null;

        return $img ? asset('images/home/'.$img) : null;
    }

    #[Layout('components.layouts.app')]
    #[Title('هداياك')]
    public function render()
    {
        return view('livewire.home');
    }
}
