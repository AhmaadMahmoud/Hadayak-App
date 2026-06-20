<?php

use App\Livewire\Home;
use App\Livewire\Intro;
use App\Livewire\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', Intro::class)->name('intro');
Route::get('/login', Login::class)->name('login');
Route::get('/home', Home::class)->name('home');
