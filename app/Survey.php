<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'surveyid',
        'user_id',
    'entity',
    'surveytype',
    'surveytitle',
    'startdate',
    'enddate',
    'starttime',
    'endtime',
    'meetingdate',
    'status',
    'meetingtitle'];
}
