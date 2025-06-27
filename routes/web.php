<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\UserRegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\MemberRegistrationController;
use App\Http\Controllers\EventMasterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\DGTeamController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ZipCodeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\ServiceActivityTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EventUserRegistrationController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Backend\DashboardController;

/*
  |--------------------------------------------------------------------------
  | Public Routes
  |--------------------------------------------------------------------------
 */

Route::get('/', [HomePageController::class, 'home'])->name('home');
Route::post('/registration', [UserRegistrationController::class, 'registration'])->name('registration');

Route::middleware('guest')->group(function () {
      Route::get('/login', [LoginController::class, 'index'])->name('login');
      Route::post('/login', [LoginController::class, 'authenticate']);

      Route::get('/auth-pass-reset-basic', [ForgotPasswordController::class, 'index'])->name('password.forgot');
      Route::post('/auth-pass-reset-basic', [ForgotPasswordController::class, 'forgot']);

      Route::get('/auth-pass-change-basic', [ResetPasswordController::class, 'index'])->name('password.reset');
      Route::post('/auth-pass-change-basic', [ResetPasswordController::class, 'reset']);
});

// Static views (optional)
Route::view('/auth-signin-basic', 'pages.auth.auth-signin-basic');
Route::view('/auth-signin-cover', 'pages.auth.auth-signin-cover');
Route::view('/auth-signup-basic', 'pages.auth.auth-signup-basic');
Route::view('/auth-signup-cover', 'pages.auth.auth-signup-cover');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

/*
  |--------------------------------------------------------------------------
  | AJAX Routes (Public)
  |--------------------------------------------------------------------------
 */

Route::get('/get-cities/{state_id}', [LocationController::class, 'getCities']);
Route::get('/get-zipcodes/{city_id}', [LocationController::class, 'getZipCodes']);
Route::get('/users/ajax', [UserController::class, 'ajaxUsers'])->name('users.ajax');

Route::get('/regions-by-district/{district_id}', [RegionController::class, 'getByDistrict']);
Route::get('/zones-by-region/{region_id}', [ZoneController::class, 'getByRegion']);
Route::get('/clubs-by-zone/{zone_id}', [ClubController::class, 'getByZone']);

Route::get('/get-zones/{region_id}', [AjaxController::class, 'getZones']);
Route::get('/get-clubs/{zone_id}', [AjaxController::class, 'getClubs']);

Route::post('/members/check-membership', [MemberController::class, 'checkMembership'])->name('members.check.membership');
Route::post('/members/check-email', [MemberController::class, 'checkEmail'])->name('members.check.email');

/*
  |--------------------------------------------------------------------------
  | Authenticated Routes (Prefix: lions)
  |--------------------------------------------------------------------------
 */

Route::middleware(['auth', 'role:admin|super-admin'])->prefix('lions')->group(function () {
//      Route::view('dashboard', 'backend.dashboard.index')->name('dashboard');

      Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

      Route::middleware(['role:super-admin|admin'])->group(function () {
            Route::resource('permissions', PermissionController::class)->except(['destroy']);
            Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

            Route::resource('roles', RoleController::class)->except(['destroy']);
            Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
            Route::get('roles/{role}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.give-permissions.form');
            Route::put('roles/{role}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('roles.give-permissions');
      });

      Route::resource('users', UserController::class)->except(['destroy']);
      Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
      Route::get('users/ajax', [UserController::class, 'ajaxUsers'])->name('lions.users.ajax');

      Route::get('/profile', [UserController::class, 'profile'])->name('profile');
      Route::get('/profile/edit', [UserController::class, 'profile_edit'])->name('profile.edit');
      Route::post('/profile/update', [UserController::class, 'profile_update'])->name('profile.update');

      /*
        |--------------------------------------------------------------------------
        | Members
        |--------------------------------------------------------------------------
       */
      Route::get('members/bulk-upload-form', [MemberController::class, 'showBulkUploadForm'])->name('members.bulk-upload-form');
      Route::post('members/bulk-upload', [MemberController::class, 'importMembers'])->name('members.bulk-upload');
      Route::post('members/bulk-delete', [MemberController::class, 'bulkDelete'])->name('members.bulkDelete');
      Route::post('members/{id}/convert-user', [MemberController::class, 'convertToUser'])->name('members.convertToUser');
      Route::get('/members/search', [MemberController::class, 'members_search'])->name('members.search');

      /*
        |--------------------------------------------------------------------------
        | Resource Routes
        |--------------------------------------------------------------------------
       */
      Route::resources([
                'accounts' => AccountController::class,
                'services' => ServiceController::class,
                'events' => EventMasterController::class,
                'sponsors' => SponsorController::class,
                'service-activity-types' => ServiceActivityTypeController::class,
                'states' => StateController::class,
                'cities' => CityController::class,
                'zip-codes' => ZipCodeController::class,
                'dg-teams' => DGTeamController::class,
                'members' => MemberController::class,
                'occupations' => OccupationController::class,
                'regions' => RegionController::class,
                'districts' => DistrictController::class,
                'zones' => ZoneController::class,
                'clubs' => ClubController::class,
                'event_user_registration' => EventUserRegistrationController::class,
      ]);

      /*
        |--------------------------------------------------------------------------
        | Event Registration
        |--------------------------------------------------------------------------
       */
      Route::get('/event_user_registration/{id}/registrations', [EventUserRegistrationController::class, 'showRegistrations'])->name('event_user_registration.showRegistrations');
      Route::get('/event_user_registration/{event}/registrations/data', [EventUserRegistrationController::class, 'getRegistrations'])->name('event_user_registration.data');

      Route::get('my-registrations', [EventMasterController::class, 'registrationHistory'])->name('events.history');
       
       Route::post('self_registraion_save/', [EventMasterController::class, 'self_registraion_save'])->name('events.self_registraion_save');
      Route::get('event/registration-card/{event}', [EventMasterController::class, 'showRegistrationCard'])->name('event.registration.card');

      /*
        |--------------------------------------------------------------------------
        | Service Export
        |--------------------------------------------------------------------------
       */
      Route::get('services-export-pdf', [ServiceController::class, 'exportPDF'])->name('services.export.pdf');
      Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
      Route::post('services/bulk-delete', [ServiceController::class, 'bulkDelete'])->name('services.bulk-delete');

      /*
        |--------------------------------------------------------------------------
        | Club Export
        |--------------------------------------------------------------------------
       */
      Route::get('clubs/export-pdf', [ClubController::class, 'exportPdf'])->name('clubs.exportPdf');

      /*
        |--------------------------------------------------------------------------
        | Location
        |--------------------------------------------------------------------------
       */
      Route::get('location', [LocationController::class, 'showForm'])->name('location.form');

      /*
        |--------------------------------------------------------------------------
        | Occupation Bulk Delete
        |--------------------------------------------------------------------------
       */
      Route::post('occupations/bulk-delete', [OccupationController::class, 'bulkDelete'])->name('occupations.bulkDelete');

      /*
        |--------------------------------------------------------------------------
        | District List
        |--------------------------------------------------------------------------
       */
      Route::get('districts/list', [DistrictController::class, 'list'])->name('districts.list');

      /*
        |--------------------------------------------------------------------------
        | Member Registration Routes
        |--------------------------------------------------------------------------
       */
      Route::prefix('registration')->name('member.registration.')->controller(MemberRegistrationController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::post('/store', 'store')->name('store');
            Route::delete('/delete/{id}', 'delete')->name('delete');
      });
});
