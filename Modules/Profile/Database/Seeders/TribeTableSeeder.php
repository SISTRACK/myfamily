<?php

namespace Modules\Profile\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TribeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $tribes = [
            'Hausa','Fulfulde','Yoruba','Chlela'
        ];
        foreach ($tribes as $tribe) {
            Tribe::firstOrCreate([
              'name'=>$tribe
            ]);
        }
    }
}
