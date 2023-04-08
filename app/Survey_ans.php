<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey_ans extends Model
{
    protected $fillable=['survey_id','survey_que_id','user_id','status','ans'];

}
