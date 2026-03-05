<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class DashboardController extends Controller

{
    public function index(){
        $user=auth()->user();
        $colocation=$user->colocations()->where('is_active',true)->with(['expenses','users'])->first();
        $expenses=$user->expenses()->with('categorie');
        return view('dashboard',compact('user','colocation','expenses'));
    }
}