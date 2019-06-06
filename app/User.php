<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
class User extends Authenticatable
{
    use Notifiable, Billable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accounts() {
      return $this->hasMany('App\SocialAccount');
    }
    public function posts() {
      return $this->hasMany('App\Post');
    }

    public function death()
    {
        return $this->hasMany('Modules\Death\Entities\Death');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
    public function profile()
    {
      return $this->hasOne('Modules\Profile\Entities\Profile');
    }
    public function family()
    {
      return $this->hasOne('Modules\Family\Entities\Family');
    }

    public function validUserGeneration($gen)
    {
        $flag = true;
        if($this->profile->child != null){
            $current_user = $this;
            for($i = 1; $i<$gen; $i++){
                $next_user = $current_user->profile->child->birth->father->husband->profile->user;
                if($user == null){
                    $flag = false;
                }else{
                    $current_user = $next_user;
                }
            }
        }
        return $flag;
    }

    public function validateIdentitySearchRequest($gen)
    {
        $error = [];

        if($gen == 0){
            $error[] = "Invalid Number of Generation $gen please enter atlease 1 Generation";
        }
        if(!$this->validUserGeneration($gen)){
            $error[] = "Sorry your family was not upto $gen generation";
        }
        
        return $error;

    }
    public function getSearchGenerationResult($gen)
    {
        $error = $this->validateIdentitySearchRequest($gen);
        if(empty($error)){
            $generations = [];
            for($i = 1; $i<=$gen; $i++){
                $user = $this;        
                $generations[] = [
                    'gen_no'    => $i,
                    'gen_data'   => $this->getUserGeneration($user)
                ];
                if($user->profile->child != null){
                    $user = $this->profile->child->birth->father->husband->profile->user;
                }  
            } 
            return $generations;
        }else{
            session()->flash('errors',$error);
        }
    }
    public function getUserGeneration($user)
    {
        $users = [];
        if($user->profile->child != null){
            $users[] = [
                [
                    'status' => 'child',
                    'profile' => $user->profile,
                ],

                [
                    'status' => 'father',
                    'profile' => $user->father(),
                ],
                
                [
                    'status' => 'mother',
                    'profile' => $user->mother(),
                ],
                
                
            ]; 
        }
        return $users;
    }

    public function father()
    {
        return $this->profile->child->birth->father->husband->profile;
        
    }
    public function mother()
    {
        return $this->profile->child->birth->mother->wife->profile;
    }
}
