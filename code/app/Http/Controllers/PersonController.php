<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PersonController extends Controller
{
    public function ban($user_id){

        $user=User::find($user_id);
        $colocation=$user->colocations()->where('is_active',true)->first();
        $expenses=$user->expenses()->get();
        if ($user->is_owner){
            return back()->with('error', 'Owner of collocation cannot be banned.');
        }

        if($colocation){
        $owner=$colocation->users()->where('is_owner',true)->first();

        foreach($expenses as $expense){
                $dette=$expense->pivot;
                $amount=$dette->amount;
                if($dette->is_payed===false){
                $expense->users()->detach($user->id);
                $expense->users()->attach($owner->id,['amount'=>$amount]);
                }
        }
        $colocation->users()->detach($user->id);
        }
        $user->decrement('reputation');
        $user->is_banned=true;
        $user->save();
        DB::table('sessions')->where('user_id',$user_id)->delete();

        return redirect()->back()->with('success','Member removed from colocation Succesfully');
    }

    public function showmembers(){
        $colocation=auth()->user()->colocations()->where('is_active',true)->first();
        $members=Membership::where('colocation_id',$colocation->id)->with('colocation','colocation.users','colocation.owner','colocation.expenses','colocation.expenses.dettes')->get();

        return view('members',compact('members','colocation'));
    }

    public function retirer($user_id){
        Gate::authorize('retirer-membre'); //almost same unction as ban, i copy pased the ban function -> added a gate for authorization and , removed lines (33,34,35) 

        $user=User::find($user_id);
        $colocation=$user->colocations()->where('is_active',true)->first();
        $expenses=$user->expenses()->get();
        if ($user->is_owner){
            return back()->with('error', 'Owner of collocation cannot be removed.');
        }

        if($colocation){
        $owner=$colocation->users()->where('is_owner',true)->first();

        foreach($expenses as $expense){
                $dette=$expense->pivot;
                $amount=$dette->amount;
                if($dette->is_payed===false){
                $expense->users()->detach($user->id);
                $expense->users()->attach($owner->id,['amount'=>$amount]);
                }
        }
        $colocation->users()->detach($user->id);
        }
        $user->decrement('reputation');

        return redirect()->back()->with('success','Member removed from colocation Succesfully');

    }
}
