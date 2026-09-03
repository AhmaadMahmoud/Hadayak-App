<?php

namespace App\Livewire;

use App\Services\Api;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Signup extends Component
{
    public string $name = '';

    public string $phone = '';

    public string $password = '';

    public ?string $error = null;

    public function mount()
    {
        if (session('token')) {
            return $this->redirect(route('home'), navigate: true);
        }
    }

    public function submit()
    {
        $this->error = null;

        $this->validate(
            [
                'name' => 'required|min:2',
                'phone' => 'required',
                'password' => 'required|min:6',
            ],
            [
                'name.required' => 'اكتب اسمك',
                'name.min' => 'اكتب اسمك',
                'phone.required' => 'اكتب رقم موبايلك',
                'password.required' => 'اكتب كلمة السر',
                'password.min' => 'كلمة السر لازم تكون 6 حروف على الأقل',
            ],
        );

        if (str_contains($this->phone, '@')) {
            $this->error = 'سجّل برقم الموبايل عشان نبعتلك كود التحقق';

            return;
        }

        $response = Api::post('/auth/register', [
            'name' => $this->name,
            'phone' => $this->phone,
            'password' => $this->password,
        ]);

        if (! $response) {
            $this->error = 'مش قادرين نوصل للسيرفر، جرب تاني';

            return;
        }

        if (isset($response['errors'])) {
            $this->error = collect($response['errors'])->flatten()->first()
                ?? 'في مشكلة في البيانات';

            return;
        }

        session(['pending_phone' => $this->phone]);

        return $this->redirect(route('verify'), navigate: true);
    }

    #[Layout('components.layouts.app')]
    #[Title('إنشاء حساب')]
    public function render()
    {
        return view('livewire.signup');
    }
}
