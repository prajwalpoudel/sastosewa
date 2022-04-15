<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'ticket_categories';
    protected $guarded = ['id'];
}
