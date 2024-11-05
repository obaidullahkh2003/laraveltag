<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subheading',
        'image',
        'start_date',
        'end_date',
        'is_active',
    ];
}
