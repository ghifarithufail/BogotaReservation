<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [ 'date'=>'datetime', 'created_at'=> 'datetime'];
    protected $dates =[
        'date',
        'created_at'
    ];

    public function Tables(){
        return $this->belongsTo(Table::class,'table_id', 'id');
    }
    
}
