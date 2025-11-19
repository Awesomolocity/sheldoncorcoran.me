<?php

use App\Http\Controllers\PostController;
use App\Livewire\Contact\Page as ContactPage;
use App\Livewire\Posts\Create\Page as CreatePost;
use App\Livewire\Posts\Edit\Page as EditPost;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/contact', ContactPage::class)
    ->name('contact');

Route::resource('posts', PostController::class)
    ->only('index');

Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', CreatePost::class)
        ->name('posts.create');

    Route::get('/posts/{post}/edit', EditPost::class)
        ->name('posts.edit');
});

Route::resource('posts', PostController::class)
    ->only('show')
    ->middleware('can:view,post');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
