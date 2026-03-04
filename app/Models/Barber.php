<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    /** @use HasFactory<\Database\Factories\BarberFactory> */
    use HasFactory;

    protected $fillable = [
        'photo',
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
        'fonction',
        'status',
    ];
}
