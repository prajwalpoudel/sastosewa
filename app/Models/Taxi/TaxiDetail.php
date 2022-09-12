<?php

namespace App\Models\Taxi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaxiDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function taxi(): BelongsTo
    {
        return $this->belongsTo(Taxi::class);
    }

    /**
     * @return HasMany
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(TaxiBooking::class);
    }
}
