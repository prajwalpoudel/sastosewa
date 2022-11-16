<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * @return MorphTo
     */
    public function bookable() {
        return $this->morphTo();
    }

    /**
     * @return HasMany
     */
    public function details() {
        return $this->hasMany(BookingDetail::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
