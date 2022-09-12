<?php

namespace App\Models\Taxi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Taxi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * @return HasMany
     */
    public function details(): HasMany
    {
        return $this->hasMany(TaxiDetail::class);
    }
}
