<?php

namespace Modules\Education\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Education\Entities\SchoolReportType;

class SchoolReportTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $school_report_types = [
            'Mental',
            'Intelligence', 
            'Dis Ability',
            'Parental Care',
            'Obedience',
            'Dis Obedience',
        ];

        foreach ($school_report_types as $school_report_type) {
            SchoolReportType::firstOrCreate(['name'=>$school_report_type]);
        }
    }
}
