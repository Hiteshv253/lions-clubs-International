<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\UserRegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\MemberRegistrationController;
use App\Http\Controllers\EventMasterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DGTeamController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ZipCodeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\AccountController;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
 */

// Public routes
Route::post('/registration', [UserRegistrationController::class, 'registration'])->name('registration');

Route::get('/', [HomePageController::class, 'home'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/auth-pass-reset-basic', [ForgotPasswordController::class, 'index'])->name('password.forgot')->middleware('guest');
Route::post('/auth-pass-reset-basic', [ForgotPasswordController::class, 'forgot'])->middleware('guest');

Route::get('/auth-pass-change-basic', [ResetPasswordController::class, 'index'])->name('password.reset')->middleware('guest');
Route::post('/auth-pass-change-basic', [ResetPasswordController::class, 'reset'])->middleware('guest');

Route::view('/auth-signin-basic', 'pages.auth.auth-signin-basic');
Route::view('/auth-signin-cover', 'pages.auth.auth-signin-cover');
Route::view('/auth-signup-basic', 'pages.auth.auth-signup-basic');
Route::view('/auth-signup-cover', 'pages.auth.auth-signup-cover');

Route::get('/get-cities/{state_id}', [LocationController::class, 'getCities']);
Route::get('/get-zipcodes/{city_id}', [LocationController::class, 'getZipCodes']);
Route::get('users/ajax', [UserController::class, 'ajaxUsers'])->name('users.ajax');

// Group routes that require authentication and prefix 'lions'
Route::prefix('lions')->middleware(['auth'])->group(function () {

      // Routes only accessible by super-admin or admin roles
      Route::middleware(['role:super-admin|admin'])->group(function () {
            // Permissions routes
            Route::resource('permissions', App\Http\Controllers\PermissionController::class);
            Route::delete('permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');

            // Roles routes
            Route::resource('roles', App\Http\Controllers\RoleController::class);
            Route::delete('roles/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
            Route::get('roles/{role}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole'])->name('roles.give-permissions.form');
            Route::put('roles/{role}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole'])->name('roles.give-permissions');

            // Users routes with AJAX (only for admins)
            Route::resource('users', UserController::class);
            Route::delete('users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
      });

      // Users routes accessible for all authenticated lions users
      Route::get('users/ajax', [UserController::class, 'ajaxUsers'])->name('lions.users.ajax');
      Route::resource('users', UserController::class)->except(['destroy']);
      Route::delete('users/{user}', [UserController::class, 'destroy'])->name('lions.users.destroy');

      // Accounts
      Route::resource('accounts', AccountController::class);
      Route::get('accounts-data', [AccountController::class, 'data'])->name('accounts.data');

      // Regions
      Route::resource('regions', RegionController::class);

      // Services
      Route::resource('services', ServiceController::class);
      Route::get('services-export-pdf', [ServiceController::class, 'exportPDF'])->name('services.export.pdf');
      Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
      Route::post('services/bulk-delete', [ServiceController::class, 'bulkDelete'])->name('services.bulk-delete');

      // Clubs
      Route::resource('clubs', ClubController::class);
      Route::get('clubs/export-pdf', [ClubController::class, 'exportPdf'])->name('clubs.exportPdf');

      // Events
      Route::resource('events', EventMasterController::class);
      Route::get('my-registrations', [EventMasterController::class, 'registrationHistory'])->name('events.history');
      Route::get('event/registration-card/{event}', [EventMasterController::class, 'showRegistrationCard'])->name('event.registration.card');

      // Dashboard view
      Route::view('dashboard', 'backend.dashboard.index')->name('dashboard');

      // States, Cities, ZipCodes
      Route::resource('states', StateController::class);
      Route::resource('cities', CityController::class);
      Route::resource('zip-codes', ZipCodeController::class);

      // Location form
      Route::get('location', [LocationController::class, 'showForm'])->name('location.form');

      // DG Teams
      Route::resource('dg-teams', DGTeamController::class);

      // Members
      Route::resource('members', MemberController::class);
      Route::get('members/bulk-upload', [MemberController::class, 'showBulkUploadForm'])->name('members.bulk-upload-form');
      Route::post('members/bulk-upload', [MemberController::class, 'importMembers'])->name('members.bulk-upload');
      Route::delete('members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
      Route::post('members/bulk-delete', [MemberController::class, 'bulkDelete'])->name('members.bulkDelete');

      // Occupations
      Route::resource('occupations', OccupationController::class);
      Route::post('occupations/bulk-delete', [OccupationController::class, 'bulkDelete'])->name('occupations.bulkDelete');

      // Districts
      Route::resource('districts', DistrictController::class);
      Route::get('districts/list', [DistrictController::class, 'list'])->name('districts.list');

      // Member Registrations
      Route::get('registration', [MemberRegistrationController::class, 'index'])->name('member.registration.index');
      Route::get('registration/create', [MemberRegistrationController::class, 'create'])->name('member.registration.create');
      Route::get('registration/edit/{id}', [MemberRegistrationController::class, 'edit'])->name('member.registration.edit');
      Route::post('registration/update/{id}', [MemberRegistrationController::class, 'update'])->name('member.registration.update');
      Route::post('registration/store', [MemberRegistrationController::class, 'store'])->name('member.registration.store');
      Route::delete('registration/delete/{id}', [MemberRegistrationController::class, 'delete'])->name('member.registration.delete');
});
