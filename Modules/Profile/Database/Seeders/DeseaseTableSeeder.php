<?php

namespace Modules\Profile\Database\Seeders;


use Module\Profile\Entitie\Desease
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DeseaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $deseases = [
          'Normal',
          'Maleria',
          'Short sightedness',
          'Long sightedness',
        ];
        foreach($deseases as $desease){
          Desease::firstOrCreate('name'=>$desease);
        }
    }
}
