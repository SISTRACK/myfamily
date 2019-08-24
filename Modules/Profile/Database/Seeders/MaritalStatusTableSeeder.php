<?php

namespace Modules\Profile\Database\Seeders;

use Module\Profile\Entitie\MaritalStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MaritalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $statuses = [
          'Single',
          'Married',
          'Divorce',
          'Cancel',
          'Engaged',
          'Separate'
        ];

        foreach($statuses as $status){
          MaritalStatus::firstOrCreate('name'=>$status);
        }
    }
}
