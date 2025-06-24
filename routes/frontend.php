<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\EventController;

/*
  |--------------------------------------------------------------------------
  | Frontend Static Pages
  |--------------------------------------------------------------------------
 */
Route::get('/', [HomePageController::class, 'home'])->name('home');
Route::get('/home', [HomePageController::class, 'home']);
Route::get('/about', [HomePageController::class, 'about'])->name('about');
Route::get('/service', [HomePageController::class, 'service'])->name('service');
Route::get('/contact', [HomePageController::class, 'contact'])->name('contact');

/*
  |--------------------------------------------------------------------------
  | Member-Only Routes (Requires Auth & Role: Member)
  |--------------------------------------------------------------------------
 */
//Route::middleware(['auth', 'role:member'])->prefix('members')->group(function () {
Route::middleware(['auth', 'role:member'])->group(function () {
      // Proper member dashboard
      Route::view('/members/dashboard', 'frontend.member_dashboard.index')->name('member_dashboard');
});

// Event-related routes
//      Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/event', [HomePageController::class, 'event'])->name('event');
Route::get('/show_event/{id}', [HomePageController::class, 'show_event'])->name('show_event');
Route::get('/events/event_card/{id}', [HomePageController::class, 'event_card'])->name('events.event_card');
Route::get('/load-more-events', [HomePageController::class, 'loadMore'])->name('events_frnt.load_more');
Route::post('/event-register', [HomePageController::class, 'event_register'])->name('event.register');

/*
  |--------------------------------------------------------------------------
  | Public Member UI (No Auth Required)
  |--------------------------------------------------------------------------
 */
Route::get('/members-ui', [HomePageController::class, 'members_ui'])->name('members-ui');
Route::get('/members/ajax', [HomePageController::class, 'ajax'])->name('frontend.members.ajax');

/*
  |--------------------------------------------------------------------------
  | Footer & Inquiry Forms
  |--------------------------------------------------------------------------
 */
Route::post('/footer-contact', [HomePageController::class, 'footer_store'])->name('footer.contact');
Route::post('/inquiry-contact', [HomePageController::class, 'inquiry_store'])->name('inquiry.contact');

/*
  |--------------------------------------------------------------------------
  | Thank You Page
  |--------------------------------------------------------------------------
 */
Route::view('/thank-you', 'thank-you')->name('thank.you');
