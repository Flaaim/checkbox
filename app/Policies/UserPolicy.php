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
        return $user->canDo(['ADMINISTRATOR', 'MODERATOR']);
        
    }

    public function store(User $user){
       return $user->canDo(['ADMINISTRATOR']);
    }
    
}
