<?php

namespace Modules\Profile\Database\Seeders;

use Modules\Profile\Entities\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $genders = [
           'Male',
           'Female',
           'Other'
        ];

        foreach($genders as $gender){
            Gender::firstOrCreate(['name'=>$gender]);
        }
        
    }
}
