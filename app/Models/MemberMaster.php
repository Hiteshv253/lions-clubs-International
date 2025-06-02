<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MemberMaster extends Model {

      use HasFactory;

      protected $table = 'club_member_masters';
      protected $fillable = [
                'first_name',
                'last_name',
                'birthday',
                'gender',
                'occupation',
                'mobile',
                'work_email',
                'membership_club_id',
                'zone_id',
                'district_id',
                'region_id',
                'is_active',
                'is_create_by',
      ];
      protected $casts = [
                'birthday' => 'date',
                'is_active' => 'boolean',
                'is_create_by' => 'boolean',
      ];
}
