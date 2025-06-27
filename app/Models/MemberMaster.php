<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\State;
use App\Models\City;
use App\Models\Region;
use App\Models\Occupation;
use App\Models\Account;

class MemberMaster extends Model {

      use HasFactory;

      protected $table = 'club_member_masters';
      protected $fillable = [
                'membership_id',
                'first_name',
                'last_name',
                'gender',
                'birthdate',
                'address_line1',
                'address_line2',
                'address_line3',
                'email',
                'mobile',
                'home_phone',
                'zipcode',
                'join_date',
                'is_active',
                'account_id',
                'state_id',
                'city_id',
                'occupation_id',
                'region_id',
                'zone_id',
                'user_id',
                'parent_id',
                'club_id',
                'last_login_at',
      ];



      public function club() {
            return $this->belongsTo(Club::class, 'club_id');
      }

      public function user() {
            return $this->belongsTo(User::class, 'user_id');
      }

      public function events() {
            return $this->belongsToMany(EventMaster::class, 'event_user', 'member_id', 'event_id')
                        ->withTimestamps();
      }

      public function parent() {
            return $this->belongsTo(MemberMaster::class, 'parent_id');
      }

      public function children() {
            return $this->hasMany(MemberMaster::class, 'parent_id');
      }

      public function state() {
            return $this->belongsTo(State::class, 'state_id');
      }

      public function city() {
            return $this->belongsTo(City::class, 'city_id');
      }

      public function region() {
            return $this->belongsTo(Region::class, 'region_id');
      }

      public function zone() {
            return $this->belongsTo(Zone::class, 'zone_id');
      }

      public function occupation() {
            return $this->belongsTo(Occupation::class, 'occupation_id');
      }

      public function account() {
            return $this->belongsTo(Account::class, 'account_id');
      }
}
