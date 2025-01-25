<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTime extends Model
{
    protected $table = 'user_times';

    protected $fillable = ['user_id', 'enter_time', 'out_time', 'date', 'date_difference'];
}
