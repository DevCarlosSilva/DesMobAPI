<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'description',
        'reporter_name',
        'report_date',
        'category',
        'location',
        'condition',
    ];
}
