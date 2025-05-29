<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'found_date',
        'status',
        'returned_date',
        'returned_to',
        'category',
        'location',
        'condition',
    ];
}
