<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    
    protected $fillable = [
        'title',
        'description',
        'place',
        'location',
        'image',
        'status',
        'date_start',
        'time_start',
        'date_end',
        'time_end',
        'participants',
        'visibility'
    ];
}
