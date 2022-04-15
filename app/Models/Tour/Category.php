<?php

namespace App\Models\Tour;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tour_categories';

    protected $guarded = ['id'];
}
