<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class DashboardController extends Controller

{
    public function index(){
        $user=auth()->user();
        $colocation=$user->colocations()->where('is_active',true)->with('colocation.expenses')->first();
        return view('dashboard',compact('user','colocation'));
    }
}