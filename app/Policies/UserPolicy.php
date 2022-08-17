<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    public function dashboard(User $user){
        foreach($user->roles as $role){
            if($role->alias == 'ADMINISTRATOR' or $role->alias == 'MODERATOR'){
                return true;
            }
        }
        
        
    }

    public function store(User $user){
        foreach($user->roles as $role){
            
            if($role->alias == 'ADMINISTRATOR'){
                return true;
            }
        }
    }
    
}
