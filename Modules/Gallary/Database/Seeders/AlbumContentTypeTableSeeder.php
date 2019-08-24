<?php

namespace Modules\Gallary\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Gallary\Entities\AlbumContentType;

class AlbumContentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $album_contents = [
            'Audio',
            'Photo',
            'Vedio'
        ];
        foreach ($album_contents as $album_content) {
            AlbumContentType::firstOrCreate(['name'=>$album_content]);
        }
    }
}
