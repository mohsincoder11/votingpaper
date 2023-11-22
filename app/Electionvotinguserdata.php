<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Electionvotinguserdata extends Authenticatable
{
    //
    protected $fillable = ['entityid','type','parent_id','serial_no','member_id_no','additional_info','orgname','memname','membershare','email','mobno','ratio','ans_status'];

}
