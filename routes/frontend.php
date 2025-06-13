<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\EventMasterController;
use App\Http\Controllers\EventController;

Route::get('/', [HomePageController::class, 'home'])->name('home');
Route::get('/home', [HomePageController::class, 'home'])->name('home');
Route::get('/about', [HomePageController::class, 'about'])->name('about');
Route::get('/service', [HomePageController::class, 'service'])->name('service');
Route::get('/contact', [HomePageController::class, 'contact'])->name('contact');
Route::get('/event', [HomePageController::class, 'event'])->name('event');
Route::get('/show_event/{id}', [HomePageController::class, 'show_event'])->name('show_event');


Route::get('/events/event_card/{id}', [HomePageController::class, 'event_card'])->name('events.event_card');

Route::post('/footer-contact', [HomePageController::class, 'footer_store'])->name('footer.contact');
Route::post('/inquiry-contact', [HomePageController::class, 'inquiry_store'])->name('inquiry.contact');

Route::get('/load-more-events', [HomePageController::class, 'loadMore'])->name('events_frnt.load_more');

;
Route::view('/thank-you', 'thank-you')->name('thank.you');
Route::post('/event-register', [HomePageController::class, 'register'])->name('event.register');
