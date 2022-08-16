<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class DashboardController extends Controller
{
    public function dashboard(){
        $users = User::all();
        $roles = Role::all();
        
        return view('dashboard', ['users'=>$users, 'roles'=>$roles]);
    }

    public function store(Request $request){
        $data = $request->except('_token');

        $users = User::all();
        
        foreach($users as $user){
            if(!empty($data)){
                $user->roles()->sync($data[$user->id]);
               } else {
                $user->roles()->detach();
               }
        }
        return redirect()->back();
       
    }
    

    
}
