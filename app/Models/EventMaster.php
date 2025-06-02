<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventMaster extends Model {

      use HasFactory;

      protected $table = 'club_event_masters';
      protected $fillable = [
                'event_name',
                'date_time',
                'description',
                'image',
                'banner_image',
                'is_active',
                'is_create_by',
      ];

      // Optionally, if you want to access the user who created:
      public function creator() {
            return $this->belongsTo(User::class, 'is_create_by');
      }
}
