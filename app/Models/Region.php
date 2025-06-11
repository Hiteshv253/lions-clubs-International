<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Zone;

class Region extends Model {

      use HasFactory;

      protected $table = 'regions';
      protected $fillable = ['name', 'district_id'];

      public function district() {
            return $this->belongsTo(District::class);
      }

      public function zones() {
            return $this->hasMany(Zone::class);
      }
}
