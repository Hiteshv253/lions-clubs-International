<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model {

      use HasFactory;

      protected $table = 'tbl_accounts_master';
      protected $fillable = ['name', 'code', 'account_no', 'type', 'is_active'];
}
