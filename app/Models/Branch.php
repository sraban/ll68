<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Branch extends Authenticatable
{
    use Notifiable;
    //
      protected $table = 'branch';
      
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
    public function getAllBranches() {
         $status=DB::table('branch')
                 ->join('branches','branches.branch_id','=','branch.id')
                 ->select('branch.*','branches.branch_name')
                 //->where('branches.status',1)
                 ->get();
        
        return $status;
    }
    function getCloseStatus($branch_id){
         $status=DB::table('branches')
                  ->where('branch_id','=',$branch_id)
                  ->pluck('sales_closed');
         return $status[0];
    }
}
