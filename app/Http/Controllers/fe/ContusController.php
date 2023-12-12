<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use App\Models\Critic;
use Illuminate\Http\Request;

class ContusController extends Controller
{
    public function index(){

        return view("frontEnd.contus");
    }

    public function critics(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'critics' => 'required',
        ], [
            'name.required' => 'Name must be input.',
            'email.required' => 'email must be input.',
            'critics.required' => 'critics must be input.',
        ]);
        
        Critic::create([
            'name' => $request->name,
            'email' => $request->email,
            'critics' => $request->critics
        ]);

        return redirect()->back()->with('success','your criticism and suggestions have been successfully');
    }
}