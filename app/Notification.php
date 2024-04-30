<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'sender_id',
        'title',
        'message',
        'mobiile_no',
        'entity_id'
    ];
}
