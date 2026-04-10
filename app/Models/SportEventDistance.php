<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportEventDistance extends Model
{
    protected $fillable = [
        'sport_event_id',
        'name',
        'slots',
        'description',
        'distance',
        'price',
        'status',
    ];
}
