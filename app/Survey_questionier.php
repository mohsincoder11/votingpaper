<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey_questionier extends Model
{
    protected $fillable = ['surveyid','question_type','question','option_1','option_2','option_3','option_4','answer','image_1','image_2','image_3','image_4','question_image'];
}
