<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    

    public function dashboard(){
        

        $authUser = Auth::user();
        return view('dashboard', ['authUser'=>$authUser]);
    }


    

    
}
