<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class __Region extends Model {

      use HasFactory;

      protected $table = 'regions';
      protected $fillable = ['name', 'parent_id'];

      public function parent() {
            return $this->belongsTo(Region::class, 'parent_id');
      }

      public function children() {
            return $this->hasMany(Region::class, 'parent_id');
      }
}
