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
    /**
     * This set name of the zip folder odf the user personal data
     *
     * @var array
     */
    public function personalDataExportName(string $realFilename): string {
        $userName = Str::slug($this->email);

        return "personal-data-{$userName}.zip";
    }
    /**
     * This will select all the information to store in the personal data as zip.
     *
     * @var array
     */
    public function selectPersonalData(PersonalDataSelection $personalDataSelection) {
        $personalDataSelection
            ->add('user.json', ['last_name'=>$this->last_name,'fisrt_name' => $this->first_name, 'email' => $this->email,'phone'=>$this->phone])
            ->addFile(storage_path("avatars/{$this->id}.jpg");
            ->addFile('other-user-data.xml', 's3');
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
}
