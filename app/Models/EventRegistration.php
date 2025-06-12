<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventRegistration extends Model {

      use HasFactory;

      protected $table = 'event_registrations';
      protected $fillable = ['name', 'email', 'event_id'];
}
