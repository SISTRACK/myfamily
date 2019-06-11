<?php

namespace Modules\Gallary\Entities;

use Modules\Core\Entities\BaseModel;

class Album extends BaseModel
{
    
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

    public function albumType()
    {
    	return $this->belongsTo(AlbumType::class);
    }

    public function albumContentType()
    {
    	return $this->belongsTo(AlbumContentType::class);
    }
    public function getName()
    {
    	return substr($this->name, 0, strpos($this->name, '_'));
    }
}
