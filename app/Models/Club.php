<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model {

      use HasFactory;

      protected $fillable = [
                'account_name', 'type', 'parent_account', 'district', 'region_zone', 'lion_id',
                'charter_established_date', 'active_member_count', 'club_specialty',
                'club_sub_specialty', 'specialty_description', 'description', 'website',
                'meeting_place', 'meeting_week', 'meeting_day', 'meeting_time', 'meeting_street',
                'meeting_city', 'meeting_state', 'meeting_zip', 'meeting_country',
                'meeting_local_place', 'meeting_local_street', 'meeting_local_city',
                'meeting_local_zip', 'meeting_local_state', 'meeting_local_country',
                'online_meeting_1', 'online_meeting_1_place', 'online_meeting_1_address',
                'meeting2_place', 'meeting2_week', 'meeting2_day', 'meeting2_time',
                'meeting2_street', 'meeting2_city', 'meeting2_state', 'meeting2_zip',
                'meeting2_country', 'meeting2_local_place', 'meeting2_local_street',
                'meeting2_local_city', 'meeting2_local_zip', 'meeting2_local_state',
                'meeting2_local_country', 'online_meeting_2', 'online_meeting_2_place',
      ];
}
