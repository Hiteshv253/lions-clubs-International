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
                'member_id',
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
                'state_id', // changed from 'state'
                'city_id', // changed from 'city'
                'occupation_id',
                'region_id',
                'zone_id',
                'club_id',
      ];

      public function state() {
            return $this->belongsTo(State::class, 'state_id');
      }

      public function city() {
            return $this->belongsTo(City::class, 'city_id'); // 'city_id' is FK
      }

      public function region() {
            return $this->belongsTo(Region::class, 'region_id');
      }

      public function account() {
            return $this->belongsTo(Account::class, 'account_id');
      }

      public function occupation() {
            return $this->belongsTo(Occupation::class, 'occupation_id');
      }

      public function zone() {
            return $this->belongsTo(Zone::class, 'zone_id');
      }

      public function club() {
            return $this->belongsTo(Club::class, 'club_id');
      }
}
