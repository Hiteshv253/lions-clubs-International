<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model {

      use HasFactory;

      protected $fillable = ['name', 'code', 'type', 'is_active'];
}
