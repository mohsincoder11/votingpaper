<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    //
	protected $fillable = ['ibcid','entity','votingtype','votingtitle','votestartdate','voteenddate','votestarttime','voteendtime','meetingdate','status','resulttype','meetingtitle',];

}
