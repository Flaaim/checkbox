<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($alias, $require = false){
        if(is_array($alias)){
            foreach($alias as $roleName){
                $result = $this->hasRole($roleName);
                if($result && !$require){
                    return true;
                } else if(!$result && $require){
                    return false;
                }
            }
        }else{
            foreach($this->roles as $role){
                    if($role->alias == $alias){
                        return true;
                    } 
            }
        }
        return $require; 
    }
    

    public function canDo($alias, $require = false){
        if(is_array($alias)){
            foreach($alias as $permName){
                $result = $this->canDo($permName);
                if($result && !$require){
                    return true;
                } else if(!$result && $require){
                    return false;
                }
            }
        }else{
            foreach($this->roles as $role){
                foreach($role->permissions as $perms){
                   
                    if($perms->alias == $alias){

                        return true;
                    } 
                }
            }
        }
        return $require; 
    }

    public function getRoles(){
        if($this->roles){
            return $this->roles;
        }
        return [];
    }

    public function getMergedPermissions(){
        $result = [];
            foreach($this->roles as $role){
                array_merge($result, $role->permissions->toArray());
            }
        return $result;
    }
}
