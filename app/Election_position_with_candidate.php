<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election_position_with_candidate extends Model
{
    protected $fillable=['candidate_id','election_id','position_id','position_name'];
}
