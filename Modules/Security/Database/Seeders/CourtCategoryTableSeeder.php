<?php

namespace Modules\Security\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Security\Entities\CourtCategory;

class CourtCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $court_categories = ['Jidutiary','Legistilative'];
      
        foreach ($court_categories as $court_category) {
            CourtCategory::firstOrCreate(['name'=>$court_category]);
        }
    }
}
