<?php

use App\Livewire\AddAddress;
use App\Livewire\Addresses;
use App\Livewire\GiftBox;
use App\Livewire\GiftCard;
use App\Livewire\GiftWrap;
use App\Livewire\Home;
use App\Livewire\Intro;
use App\Livewire\Login;
use App\Livewire\MyOrders;
use App\Livewire\Payment;
use App\Livewire\ProductDetail;
use App\Livewire\Profile;
use App\Livewire\Products;
use App\Livewire\Signup;
use App\Livewire\VerifyCode;
use Illuminate\Support\Facades\Route;

Route::get('/', Intro::class)->name('intro');
Route::get('/login', Login::class)->name('login');
Route::get('/signup', Signup::class)->name('signup');
Route::get('/verify', VerifyCode::class)->name('verify');
Route::get('/home', Home::class)->name('home');
Route::get('/products', Products::class)->name('products');
Route::get('/product/{id?}', ProductDetail::class)->name('product');
Route::get('/gift-box', GiftBox::class)->name('gift-box');
Route::get('/gift-wrap', GiftWrap::class)->name('gift-wrap');
Route::get('/gift-card', GiftCard::class)->name('gift-card');
Route::get('/addresses', Addresses::class)->name('addresses');
Route::get('/add-address', AddAddress::class)->name('add-address');
Route::get('/payment', Payment::class)->name('payment');
Route::get('/profile', Profile::class)->name('profile');
Route::get('/orders', MyOrders::class)->name('my-orders');
