<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoryController extends Controller{
    public function story(){
        return view("frontEnd.story");
    }
}