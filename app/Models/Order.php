<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    public const int STATUS_PENDING = 0;

    public const int STATUS_PAID = 1;

    public const int STATUS_FAILED = 2;

    protected $fillable = [
        'sport_event_id',
        'sport_event_distance_id',
        'user_id',
        'price',
        'status',
        'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function distance(): BelongsTo
    {
        return $this->belongsTo(SportEventDistance::class, 'sport_event_distance_id');
    }
}
