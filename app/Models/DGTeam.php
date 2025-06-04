<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DGTeam extends Model {

      use HasFactory;

      protected $table = 'd_g_teams';
      // If your DB table name is not 'd_g_teams' or 'dg_teams', specify it here:
      // protected $table = 'dg_teams';
      // Mass assignable attributes
      protected $fillable = [
                'name',
                'email',
                'designation',
                'phone',
                'address',
                'is_active',
      ];
}
