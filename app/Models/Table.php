<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Reservations()
    {
        return $this->belongsTo(Reservation::class,'id','table_id');
    }

}
