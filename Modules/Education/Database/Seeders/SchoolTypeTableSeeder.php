<?php

namespace Modules\Education\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Education\Entities\SchoolType;

class SchoolTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $school_types = [
            'Nursery',
            'Primary', 
            'Secondary',
            'Polytechnic',
            'Collage of Education',
            'Nursing',
            'University',
        ];
        foreach ($school_types as $school_type) {
            SchoolType::firstOrCreate(['name'=>$school_type]);
        }
    }
}
