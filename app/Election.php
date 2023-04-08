<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable = ['electionid','entity','votingtype','votingtitle','votestartdate','voteenddate','votestarttime','voteendtime','meetingdate','status','ballottype','meetingtitle','edit_count'];
}
