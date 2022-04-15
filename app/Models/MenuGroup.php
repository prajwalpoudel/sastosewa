<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuGroup extends Model
{
    /**
     * @return HasMany
     */
    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
