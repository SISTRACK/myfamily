<?php

namespace Modules\Gallary\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Gallary\Entities\AlbumType;

class AlbumTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $albums = [
            'Private',
            'Nuclear Family',
            'Extended Family'
        ];
        foreach ($albums as $album) {
            AlbumType::firstOrCreate(['name'=>$album]);
        }
    }
}
