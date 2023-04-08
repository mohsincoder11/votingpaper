<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resolution_ans extends Model
{
    protected $fillable=['ibcresolution_id','resolution_que_id','user_id','status','ans'];
}
