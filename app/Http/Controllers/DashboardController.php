<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    

    public function dashboard(){
        
        $this->authorize('dashboard', User::class);

        $users = User::all();
        $roles = Role::all();
        $authUser = Auth::user();
        return view('dashboard', ['users'=>$users, 'roles'=>$roles, 'authUser'=>$authUser]);
    }

    public function store(Request $request){
        $data = $request->except('_token');

        $users = User::all();
        
        foreach($users as $user){
            if(isset($data[$user->id])){
                $user->roles()->sync($data[$user->id]);
                
               } else {
                $user->roles()->detach();
               }
        }
        return redirect()->back();
       
    }
    

    
}
