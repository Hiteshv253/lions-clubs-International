<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model {

      use HasFactory;

      protected $table = 'event_registrations';
      protected $fillable = [
                'name',
                'email',
                'event_id',
                'contact_number',
                'number_of_persons',
                'calculated_total'
      ];
}
