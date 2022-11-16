<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LaborDocument extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function labor() {
        return $this->belongsTo(Labor::class, 'labor_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function medias(): HasMany
    {
        return $this->hasMany(LaborDocumentMedia::class, 'labor_document_id', 'id');
    }
}
