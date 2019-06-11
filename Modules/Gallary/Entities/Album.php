<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [];

    public function profileAlbums()
    {
    	return $this->hasMany(ProfileAlbum::class);
    }

    public function familyAlbums()
    {
    	return $this->hasMany(FamilyAlbum::class);
    }

    public function vedios()
    {
    	return $this->hasMany(Vedio::class);
    }

    public function photos()
    {
    	return $this->hasMany(Photo::class);
    }

    public function accesses()
    {
    	return $this->hasMany(AccessAlbum::class);
    }
}
