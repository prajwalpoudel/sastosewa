<?php

namespace App\Models\Ticket;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Ticket extends Model
{
    use HasFactory;
    use FormAccessible;

    protected $guarded = ['id'];
    protected $casts = [
        'date' => 'date:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
    ];

    public function formDateAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

}
