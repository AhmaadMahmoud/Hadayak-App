<?php

namespace App\Services;

/**
 * سلة هداياك — متخزنة في الجلسة.
 * بتحمل المنتجات + اختيارات التغليف والكارت والعنوان ونوع التوصيل
 * لحد ما الطلب يتبعت للسيرفر ويتم مسحها.
 */
class Cart
{
    /** @return array<int, array{id: int, name: string, price: float, image: string|null, qty: int}> */
    public static function items(): array
    {
        return session('cart.items', []);
    }

    public static function count(): int
    {
        return (int) collect(static::items())->sum('qty');
    }

    public static function itemsTotal(): float
    {
        return (float) collect(static::items())->sum(fn ($i) => $i['price'] * $i['qty']);
    }

    public static function add(int $id, string $name, float $price, ?string $image = null): void
    {
        $items = static::items();

        if (isset($items[$id])) {
            $items[$id]['qty']++;
        } else {
            $items[$id] = ['id' => $id, 'name' => $name, 'price' => $price, 'image' => $image, 'qty' => 1];
        }

        session(['cart.items' => $items]);
    }

    public static function increment(int $id): void
    {
        $items = static::items();
        if (isset($items[$id])) {
            $items[$id]['qty']++;
            session(['cart.items' => $items]);
        }
    }

    public static function decrement(int $id): void
    {
        $items = static::items();
        if (isset($items[$id])) {
            $items[$id]['qty']--;
            if ($items[$id]['qty'] <= 0) {
                unset($items[$id]);
            }
            session(['cart.items' => $items]);
        }
    }

    public static function remove(int $id): void
    {
        $items = static::items();
        unset($items[$id]);
        session(['cart.items' => $items]);
    }

    // ===== التغليف =====
    public static function setWrap(?int $id, float $price = 0): void
    {
        session(['cart.wrap_id' => $id, 'cart.wrap_price' => $id ? $price : 0]);
    }

    public static function wrapId(): ?int
    {
        return session('cart.wrap_id');
    }

    public static function wrapPrice(): float
    {
        return (float) session('cart.wrap_price', 0);
    }

    // ===== الكارت =====
    public static function setCard(?int $id, float $price = 0, ?string $message = null): void
    {
        session([
            'cart.card_id' => $id,
            'cart.card_price' => $id ? $price : 0,
            'cart.card_message' => $id ? $message : null,
        ]);
    }

    public static function cardId(): ?int
    {
        return session('cart.card_id');
    }

    public static function cardPrice(): float
    {
        return (float) session('cart.card_price', 0);
    }

    public static function cardMessage(): ?string
    {
        return session('cart.card_message');
    }

    // ===== العنوان ونوع التوصيل =====
    public static function setAddress(?int $id): void
    {
        session(['cart.address_id' => $id]);
    }

    public static function addressId(): ?int
    {
        return session('cart.address_id');
    }

    public static function setDelivery(string $type, ?string $recipientName = null, ?string $recipientPhone = null): void
    {
        session([
            'cart.delivery_type' => $type,
            'cart.recipient_name' => $recipientName,
            'cart.recipient_phone' => $recipientPhone,
        ]);
    }

    public static function deliveryType(): string
    {
        return session('cart.delivery_type', 'me');
    }

    public static function recipientName(): ?string
    {
        return session('cart.recipient_name');
    }

    public static function recipientPhone(): ?string
    {
        return session('cart.recipient_phone');
    }

    public static function clear(): void
    {
        session()->forget('cart');
    }
}
