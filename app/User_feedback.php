<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_feedback extends Model
{
    protected $fillable=['user_id','category','description'];
}
