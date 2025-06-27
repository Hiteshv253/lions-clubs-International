<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Zone;

class Club extends Model {

      use HasFactory;

      protected $fillable = ['name', 'zone_id', 'club_number', 'charter_date',
                'inauguration_date_club', 'about_club', 'image', 'is_active'];

      public function zone() {
            return $this->belongsTo(Zone::class);
      }

      public function members() {
            return $this->hasMany(MemberMaster::class);
      }
}
