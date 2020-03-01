<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
    //
      protected $table = 'users';
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [
        'name', 'email', 'password','user_name','role_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    protected $hidden = [
        'password', 'remember_token',
        ];
    /*
     * 
     *InsertToBranchLogin
     * Insert branches login detail 
     * $param details
     * return refference id
     */
    public function createBranch($branch) {
        $status=Branch::create($branch);
        return $status;
    }
}
