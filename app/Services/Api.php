<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * عميل الاتصال بباك اند هداياك.
 * كل الدوال بترجع null لو السيرفر مش متاح — الشاشات بتتصرف بالداتا المحلية.
 */
class Api
{
    public static function get(string $path, array $query = [], ?string $token = null): ?array
    {
        try {
            $request = Http::baseUrl(config('services.api.url'))
                ->timeout(4)
                ->acceptJson();

            if ($token) {
                $request = $request->withToken($token);
            }

            $response = $request->get($path, $query);

            return $response->successful() ? $response->json() : null;
        } catch (\Throwable) {
            return null;
        }
    }

    public static function post(string $path, array $data = [], ?string $token = null): ?array
    {
        try {
            $request = Http::baseUrl(config('services.api.url'))
                ->timeout(6)
                ->acceptJson();

            if ($token) {
                $request = $request->withToken($token);
            }

            $response = $request->post($path, $data);

            return $response->json();
        } catch (\Throwable) {
            return null;
        }
    }
}
