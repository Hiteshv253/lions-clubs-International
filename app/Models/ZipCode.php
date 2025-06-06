<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model {

      use HasFactory;

      public function city() {
            return $this->belongsTo(City::class);
      }
}
