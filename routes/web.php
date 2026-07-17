<?php

use App\Livewire\Home;
use App\Livewire\Intro;
use App\Livewire\Login;
use App\Livewire\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', Intro::class)->name('intro');
Route::get('/login', Login::class)->name('login');
Route::get('/home', Home::class)->name('home');
Route::get('/products', Products::class)->name('products');
