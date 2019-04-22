<?php

use Illuminate\Database\Seeder;
use Modules\Marriage\Entities\Status;
use Modules\Family\Entities\Tribe;
use Modules\Profile\Entities\MaritalStatus;
use Modules\Profile\Entities\Genotype;
use Modules\Profile\Entities\BloodGroup;
use Modules\Profile\Entities\Gender;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class, 25)->create()->each(function ($u) {
        for ($i=0; $i <= 3; $i++) {
          $u->posts()->save(factory(App\Post::class)->make());
        }  
      });

      $genotype =[
      'SS','AS','AA'
      ];
      $blood = [
          '0+','0-','A+','A-','B+','B-','AB+','AB-'
      ];
      foreach ($blood as $blood) {
        BloodGroup::firstOrCreate(['name'=>$blood]);
      }
      foreach ($genotype as $genotype) {
        Genotype::firstOrCreate(['name'=>$genotype]);
      }
      MaritalStatus::firstOrCreate([
        'name'=>'Single'
      ]);
      MaritalStatus::firstOrCreate([
        'name'=>'Married'
      ]);
      MaritalStatus::firstOrCreate([
        'name'=>'Divorce'
      ]);
      MaritalStatus::firstOrCreate([
        'name'=>'Cancel'
      ]);
      Status::firstOrCreate([
        'name'=>'First Wife'
      ]);
      Status::firstOrCreate([
        'name'=>'Second Wife'
      ]);
      Status::firstOrCreate([
        'name'=>'Third Wife'
      ]);
      Status::firstOrCreate([
        'name'=>'Forth Wife'
      ]);

      Gender::firstOrCreate([
        'name'=>'Male'
      ]);
      Gender::firstOrCreate([
        'name'=>'Female'
      ]);
      Gender::firstOrCreate([
        'name'=>'Other'
      ]);

      Tribe::firstOrCreate([
        'name'=>'Hausa'
      ]);
      Tribe::firstOrCreate([
        'name'=>'Fulfulde'
      ]);
      Tribe::firstOrCreate([
        'name'=>'Yoruba'
      ]);
      Tribe::firstOrCreate([
        'name'=>'Chlela'
      ]);
     
    }
}
