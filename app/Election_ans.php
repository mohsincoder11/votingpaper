<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election_ans extends Model
{
    protected $fillable=['election_id','user_id','candidate_id','position_id','status','rank'];

}
