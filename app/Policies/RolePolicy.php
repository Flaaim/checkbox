<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(){
        return true;
    }
    public function showRoles(User $user){
        return $user->canDo(['ROLES_ACCESS', 'ADMINISTRATOR']);
    }
    public function showPermissions(User $user){
       return true;
    }

    public function store(User $user){
        
        return $user->canDo(['ROLES_ACCESS','ADMINISTRATOR']);
    }
}
