<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterMessage extends Model {

      use HasFactory;

      protected $table = 'footer_contact_us';
      protected $fillable = ['name', 'email', 'message', 'contact_no', 'inquery_from', 'is_active'];
}
