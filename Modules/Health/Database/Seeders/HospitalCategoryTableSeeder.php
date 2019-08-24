<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Health\Entities\HospitalCategory;

class HospitalCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $hospital_categories = ['Teaching Hospital','Federal Medical Center','General Hospital','Clinic','Dispensary'];
        
        foreach ($hospital_categories as $hospital_gategory) {
            HospitalCategory::firstOrCreate(['name'=>$hospital_gategory]);
        }
    }
}
