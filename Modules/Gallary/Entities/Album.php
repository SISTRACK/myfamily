<?php

namespace Modules\Gallary\Entities;

use Modules\Core\Entities\BaseModel;

class Album extends BaseModel
{
    
    public function profileAlbum()
    {
    	return $this->hasOne(ProfileAlbum::class);
    }

    public function familyAlbum()
    {
    	return $this->hasOne(FamilyAlbum::class);
    }

    public function videos()
    {
    	return $this->hasMany(Video::class);
    }
    public function audios()
    {
    	return $this->hasMany(Audio::class);
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
