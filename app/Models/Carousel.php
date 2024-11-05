<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'subheading',
        'heading',
        'button_text',
        'button_link',
        'is_active',
    ];
}