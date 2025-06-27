<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventRegistration;

class EventMaster extends Model {

      use HasFactory;

      protected $table = 'club_event_masters';
      protected $fillable = [
                'event_name',
                'description',
                'image',
                'total_amount',
                'event_start_date',
                'event_end_date',
                'is_active',
                'is_create_by',
                'venue_name',
                'flag_id',
                'total_event_users',
                'total_registered_user',
                'total_pendding_users',
                'limited_sheet',
                'event_qr_code',
      ];

      public function registrations() {
            return $this->hasMany(EventRegistration::class, 'event_id');
      }

      // Optionally, if you want to access the user who created:
//      public function creator() {
//            return $this->belongsTo(User::class, 'is_create_by');
//      }
//
//      public function registrants() {
//            return $this->belongsToMany(User::class, 'event_registrations')
//                        ->withTimestamps()
//                        ->withPivot('registered_at');
//      }
}
