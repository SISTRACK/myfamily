<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Admin\Entities\Admin;
use Illuminate\Database\Eloquent\Model;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $admins = [
            'Super',
            'Intermediate',
            'State Cooditaor',
            'Lga Cooditaor',
            'Town Cooditaor',
            'Area Cooditaor'
        ];
        foreach ($admins as $admin) {
            AdminStatus::firstOrCreate([
                'name'=>$admin
            ]);
        }
    }
}
