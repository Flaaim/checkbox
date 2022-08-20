<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function index(){
        
        $this->authorize('showPermissions', Role::class);
        $roles = Role::all();
        $authUser = Auth::user();
        $permissions = Permission::all();
        return view('permission', ['roles'=>$roles, 'permissions'=> $permissions, 'authUser'=>$authUser]);
    }

    public function store(Request $request){
        $this->authorize('store', Role::class);
        $data = $request->except('_token');
        $roles = Role::all();
        foreach($roles as $role){
            if(isset($data[$role->id])){
                $role->permissions()->sync($data[$role->id]);
            } else {
                $role->permissions()->detach();
            }
        }
        return redirect()->back();
    }


}
