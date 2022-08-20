<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function hasPerms($alias){
        
            foreach($this->permissions as $perm){
                if($perm->alias == $alias){
                    return true;
                }
            }
    } 


}
