<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SportEvent extends Model
{
    protected $fillable = [
        'name',
        'organisation',
        'location',
        'start_date_at',
        'status',
        'price',
    ];

    protected $casts = [
        'start_date_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function distances(): HasMany
    {
        return $this->hasMany(SportEventDistance::class);
    }
}
