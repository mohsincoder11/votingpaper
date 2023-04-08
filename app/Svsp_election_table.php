<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Svsp_election_table extends Model
{
    protected $fillable=['election_id','ballottype','candidate_id_no','candidate_name','candidate_info','candidate_photo','candidate_election_symbol','candidate_group_name','candidate_biodata',];
}
