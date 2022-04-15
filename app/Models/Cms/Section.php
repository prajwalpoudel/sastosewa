<?php

namespace App\Models\Cms;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    /**
     * @return \string[][]
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['page.title', 'page_title'],
                'separator' => '_',
                'unique' => false
            ]
        ];
    }

    /**
     * @return BelongsTo
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

}
