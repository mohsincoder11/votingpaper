<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usermanage extends Model
{
    //
	protected $fillable = [
		'user_id',
		'regnew',
		'regedit',
		'regview',
		'elecmake',
		'elecedit',
		'elecview',
		'resmake',
		'resedit',
		'resview',
		'surmake',
		'suredit',
		'surview',
	];
}
