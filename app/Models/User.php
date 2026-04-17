<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name',
    'email',
    'date_of_birth',
    'gender',
    'phone',
    'emergency_phone',
    'country',
    'city',
    'running_club',
    'id_intra',
    'confirmation_of_qualification',
    't_shirt',
    'status',
    'password',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public const STATUS_CREATED = 0;

    public const STATUS_ACTIVE = 1;

    public const STATUS_DISABLED = 2;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function paidOrder(): HasOne
    {
        return $this->hasOne(Order::class)->where('status', Order::STATUS_PAID);
    }

    public function getAgeAttribute(): ?int
    {
        if (! $this->date_of_birth) {
            return null;
        }

        try {
            return Carbon::createFromFormat('d-m-Y', $this->date_of_birth)->age;
        } catch (\Exception $e) {
            return null;
        }
    }
}
