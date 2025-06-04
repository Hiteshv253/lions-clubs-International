<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MemberMaster extends Model {

      use HasFactory;

      protected $table = 'club_member_masters';
      protected $fillable = [
                'account_name',
                'parent_region',
                'parent_zone',
                'member_id',
                'first_name',
                'last_name',
                'address_line1',
                'address_line2',
                'address_line3',
                'city', 'state',
                'zip',
                'birthdate',
                'email',
                'mobile',
                'home_phone',
                'gender',
                'occupation',
                'join_date',
                'is_active',
                'is_create_by'
      ];
      protected $casts = [
                'birthday' => 'date',
                'is_active' => 'boolean',
                'is_create_by' => 'boolean',
      ];
}
