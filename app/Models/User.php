<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable {

      use HasApiTokens,
          HasFactory,
          HasRoles,
          Notifiable;

      /**
       * The attributes that are mass assignable.
       *
       * @var array<int, string>
       */
      protected $fillable = [
                'last_name',
                'first_name',
                'name',
                'email',
                'membership_id',
                'last_login_at',
                'password',
      ];

      /**
       * The attributes that should be hidden for serialization.
       *
       * @var array<int, string>
       */
      protected $hidden = [
                'password',
                'remember_token',
      ];

      /**
       * The attributes that should be cast.
       *
       * @var array<string, string>
       */
      protected $casts = [
                'email_verified_at' => 'datetime',
                'password' => 'hashed',
      ];

      public function registeredEvents() {
            return $this->belongsToMany(EventMaster::class, 'event_registrations')
                        ->withTimestamps()
                        ->withPivot('registered_at');
      }
}
