<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use DB;
class User extends Authenticatable
{
    use Notifiable,HasRoles;

    protected $table ='aja_users';

    public function roles(){
      return $this->belongToMany('App\Role','user_role','user_id','role_id');
    }

    public function hasAnyRole($roles){
      if(is_array($roles)){
        foreach($roles as $role){
          if($this->hasRole($role)){
            return true;
          }
        }
      }
      else{
          if($this->hasRole($roles)){
            return true;
          }
        }
        return false;
      }
    
    public function hasRole($role)
    {
      if($this->roles()->where('name',$role)->first()){
        return true;
      }
      return false;
    }
    public function member()
    {
      return $this->hasMany(Member::class);
    }
    public static function getId()
    {
       return $getId = DB::table('users')->orderBy('id')->take(1)->get(); 
       
         # code...
       }
    }
   
   

