<?php

namespace App\Livewire;

use App\Services\Api;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class VerifyCode extends Component
{
    public string $code = '';

    public ?string $error = null;

    public ?string $notice = null;

    public function mount()
    {
        if (session('token')) {
            return $this->redirect(route('home'), navigate: true);
        }

        if (! session('pending_phone')) {
            return $this->redirect(route('signup'), navigate: true);
        }
    }

    public function submit()
    {
        $this->error = null;

        $this->validate(
            ['code' => 'required'],
            ['code.required' => 'اكتب الكود اللي وصلك'],
        );

        $response = Api::post('/auth/verify-otp', [
            'phone' => session('pending_phone'),
            'code' => $this->code,
        ]);

        if (! $response) {
            $this->error = 'مش قادرين نوصل للسيرفر، جرب تاني';

            return;
        }

        if (! isset($response['token'])) {
            $this->error = 'الكود غير صحيح أو انتهت صلاحيته';

            return;
        }

        session()->forget('pending_phone');
        session([
            'token' => $response['token'],
            'user' => $response['user'],
        ]);

        return $this->redirect(route('home'), navigate: true);
    }

    public function resend(): void
    {
        $this->error = null;
        Api::post('/auth/resend-otp', ['phone' => session('pending_phone')]);
        $this->notice = 'اتبعت كود جديد';
    }

    #[Layout('components.layouts.app')]
    #[Title('كود التحقق')]
    public function render()
    {
        return view('livewire.verify-code');
    }
}
