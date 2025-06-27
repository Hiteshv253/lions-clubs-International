<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use App\Models\State;

class District extends Model {

      use HasFactory;

      protected $fillable = ['name', 'state_id', 'is_active'];

      // Optional relation to State model

      public function regions() {
            return $this->hasMany(Region::class);
      }

      public function state() {
            return $this->belongsTo(State::class);
      }
}
