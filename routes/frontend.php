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
Route::get('/events/{id}', [HomePageController::class, 'show_event'])->name('events.show_event');


Route::get('/load-more-events', [HomePageController::class, 'loadMore'])->name('events_frnt.load_more');




Route::post('/submit-inquiry', [HomePageController::class, 'submit'])->name('inquiry.submit');
;
Route::view('/thank-you', 'thank-you')->name('thank.you');
Route::post('/event-register', [HomePageController::class, 'register'])->name('event.register');
