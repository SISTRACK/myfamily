<?php

namespace Modules\Education\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Education\Entities\SchoolCategory;

class SchoolCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $school_categories = ['Government','Private'];
        foreach ($school_categories as $school_category) {
            SchoolCategory::firstOrCreate(['name'=>$school_category]);
        }
    }
}
