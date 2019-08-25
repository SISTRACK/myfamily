<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Health\Entities\HospitalDepartment;

class HospitalDepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $departments = [
            'CASUALTY',
            'ANEASTHETICS',
            'CARDIOLOGY',
            'CRITICAL CARE',
            'EARS, NOSE AND THROAT (ENT)',
            'GERIATRICS',
            'GASTROENTEROLOGY',
            'GENERAL SURGERY',
            'GYNAECOLOGY',
            'HAEMATOLOGY ',
            'MATERNITY/NEONATAL/PAEDIATRICS',
            'NEUROLOGY',
            'ONCOLOGY',
            'OPTHALMOLOGY',
            'ORTHOPEDICS',
            'UROLOGY',
            'PSYCHIATRY',
            'OUTPATIENT',
            'INPATIENT',
            'CENTRAL STERILIZATION UNIT',
            'HOUSEKEEPING',
            'CATERING AND FOOD SERVICES',
            'MEDICAL SOCIAL WORK',
            'PHYSIOTHERAPY',
            'PHARMACY',
            'NUTRITION AND DIETITICS',
            'MICROBIOLOGY',
            'DIAGNOSTIC IMAGING',
            'MEDICAL RECORDS ',
            'MEDICAL MAINTENANCE & ENGINEERING ',
            'INFORMATION TECHNOLOGY & COMMUNICATION ',
            'HUMAN RESOURCES',
            'FINANCE ',
            'ADMINISTRATION '
        ];

        foreach($departments as $department){
            HospitalDepartment::firstOrCreate(['name'=>$department]);
        }
    }
}
