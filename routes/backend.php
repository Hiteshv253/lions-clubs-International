<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

//use App\Http\Controllers\Auth\ResetPasswordController;

Route::prefix('lions')->middleware(['auth'])->group(function () {

      Route::get('/login', [LoginController::class, 'index'])->name('login');
      Route::post('/', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
      Route::get('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');
      Route::view('/dashboard-analytics', 'menu.dashboards.dashboard-analytics');

      Route::view('/dashboard-analytics', 'menu.dashboards.dashboard-analytics');
      Route::view('/dashboard-crm', 'menu.dashboards.dashboard-crm');
      Route::view('/dashboard-ecommerce', 'menu.dashboards.dashboard-ecommerce')->middleware('auth');
      Route::view('/dashboard-crypto', 'menu.dashboards.dashboard-crypto');
      Route::view('/dashboard-job', 'menu.dashboards.dashboard-job');
      Route::view('/dashboard-nft', 'menu.dashboards.dashboard-nft');
      Route::view('/dashboard-projects', 'menu.dashboards.dashboard-projects');

      Route::view('/auth-signin-basic', 'pages.auth.auth-signin-basic');
      Route::view('/auth-signin-cover', 'pages.auth.auth-signin-cover');
      Route::view('/auth-signup-basic', 'pages.auth.auth-signup-basic');
      Route::view('/auth-signup-cover', 'pages.auth.auth-signup-cover');
      Route::get('/auth-pass-reset-basic', [ForgotPasswordController::class, 'index'])->name('password.forgot')->middleware('guest');
      Route::post('/auth-pass-reset-basic', [ForgotPasswordController::class, 'forgot'])->name('password.forgot')->middleware('guest');
      Route::view('/auth-pass-reset-cover', 'pages.auth.auth-pass-reset-cover');
      Route::get('/auth-pass-change-basic', [ResetPasswordController::class, 'index'])->name('password.reset')->middleware('guest');
      Route::post('/auth-pass-change-basic', [ResetPasswordController::class, 'reset'])->name('password.reset')->middleware('guest');
      Route::view('/auth-pass-change-cover', 'pages.auth.auth-pass-change-cover');
      Route::view('/auth-lockscreen-basic', 'pages.auth.auth-lockscreen-basic');
      Route::view('/auth-lockscreen-cover', 'pages.auth.auth-lockscreen-cover');
      Route::view('/auth-logout-basic', 'pages.auth.auth-logout-basic');
      Route::view('/auth-logout-cover', 'pages.auth.auth-logout-cover');
      Route::view('/auth-success-msg-basic', 'pages.auth.auth-success-msg-basic');
      Route::view('/auth-success-msg-cover', 'pages.auth.auth-success-msg-cover');
      Route::view('/auth-twostep-basic', 'pages.auth.auth-twostep-basic');
      Route::view('/auth-twostep-cover', 'pages.auth.auth-twostep-cover');
      Route::view('/auth-404-basic', 'pages.auth.auth-404-basic');
      Route::view('/auth-404-cover', 'pages.auth.auth-404-cover');
      Route::view('/auth-404-alt', 'pages.auth.auth-404-alt');
      Route::view('/auth-500', 'pages.auth.auth-500');
      Route::view('/auth-offline', 'pages.auth.auth-offline');
});
