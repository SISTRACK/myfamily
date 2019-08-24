<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Health\Entities\Discpline;

class DoctorDiscplineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $discplines = ['Doctor','Nurse','Mid Wifery','Pharmacy','Lab Science'];

        foreach ($discplines as $discpline) {
           Discpline::firstOrCreate(['name'=>$discpline]);
        }
    }
}
