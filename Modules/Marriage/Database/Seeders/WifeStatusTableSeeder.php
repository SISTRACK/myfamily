<?php

namespace Modules\Marriage\Database\Seeders;

use Modules\Marriage\Entities\WifeStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class WifeStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $wifes = [
            'First Wife',
            'Second Wife',
            'Third Wife',
            'Forth Wife'
        ];

        foreach ($wifes as $wife) {
            WifeStatus::firstOrCreate(['name' => $wife]);
        }
    }
}
