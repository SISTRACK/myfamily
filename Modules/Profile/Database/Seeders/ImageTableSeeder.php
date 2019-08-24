<?php

namespace Modules\Profile\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Profile\Entities\Image;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $images = ['male.png','female.png'];

        foreach ($images as $image) {
            Image::firstOrCreate([
                'name'=>$image
            ]);
        }
    }
}
