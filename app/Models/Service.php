<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model {

      use HasFactory;

      protected $fillable = [
                'report_type', 'title', 'sponsor', 'activity_level', 'club_name', 'cause', 'project_type', 'description',
                'start_date', 'end_date', 'currency', 'total_funds_donated_inr', 'total_funds_donated_usd', 'organization_served_for',
                'donation_in_lcif', 'people_served', 'total_volunteer_hours', 'total_funds_raised_inr', 'total_funds_raised_usd',
                'non_lion_participants', 'non_lion_family_participants', 'trees_planted', 'signature_activity', 'venue',
                'funded_by_lcif_grant', 'venue_location', 'venue_timezone', 'sponsor_club', 'sponsor_district'
      ];
}
