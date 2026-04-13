<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Order extends Model
{
    public const int STATUS_PENDING = 0;

    public const int STATUS_PAID = 1;

    public const int STATUS_FAILED = 2;

    protected $fillable = [
        'uuid',
        'sport_event_id',
        'sport_event_distance_id',
        'user_id',
        'price',
        'status',
        'paid_at',
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

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
