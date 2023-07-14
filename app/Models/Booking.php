<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'capacity'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
