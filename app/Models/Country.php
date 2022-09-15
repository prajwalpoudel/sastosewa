<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    /**
     * @return HasOne
     */
    public function labor() {
        return $this->hasOne(Labor::class, 'country_id', 'id');
    }
}
