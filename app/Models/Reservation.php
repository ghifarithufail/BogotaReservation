<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [ 'date'=>'datetime'];
    protected $dates =[
        'date'
    ];

    public function Tables(){
        return $this->belongsTo(Table::class,'table_id');
    }
    
}
