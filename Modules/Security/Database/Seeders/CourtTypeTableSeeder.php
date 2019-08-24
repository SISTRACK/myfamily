<?php

namespace Modules\Security\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Security\Entities\CourtType;

class CourtTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $court_types = ['Supreme Court', 'Sharia Court', 'Magistry Court','Higher Court', 'Court of Apeal'];
        foreach ($court_types as $court_type) {
            CourtType::firstOrCreate(['name'=>$court_type]);
        }
    }
}
