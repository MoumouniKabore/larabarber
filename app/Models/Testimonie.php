<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonie extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonieFactory> */
    use HasFactory;

    protected $fillable = [
        'photo',
        'first_name',
        'last_name',
        'message',
        'status',
    ];
}