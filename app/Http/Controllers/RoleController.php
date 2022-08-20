<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index(){
        $this->authorize('showRoles', Role::class);
        $roles = Role::all();
        $authUser = Auth::user();
        $authUser->getMergedPermissions();

        return view('roles.index', ['roles'=> $roles, 'authUser'=> $authUser]);
    }

    public function create(){
        $authUser = Auth::user();
        return view('roles.create', ['authUser'=>$authUser]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'=> 'required',
            'alias'=> 'required',
        ]);
        
        $role = Role::create([
            'title' => $request->title,
            'alias' => $request->alias,
        ]);

        return \Redirect::route('role')->with(['message'=>'Success']);
    }
    public function update(){

    }

    public function destroy(Role $role){
        $role->delete();
        return \Redirect::route('role')->with(['message'=>'Success']);
    }
}
