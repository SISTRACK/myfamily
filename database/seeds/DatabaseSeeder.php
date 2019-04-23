<?php

use Illuminate\Database\Seeder;
use Modules\Marriage\Entities\Status;
use Modules\Family\Entities\Tribe;
use Modules\Profile\Entities\MaritalStatus;
use Modules\Profile\Entities\Genotype;
use Modules\Profile\Entities\BloodGroup;
use Modules\Profile\Entities\Gender;
use Modules\Profile\Entities\Image;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $genotypes =[
        'SS','AS','AA'
      ];

      $bloods = [
        '0+','0-','A+','A-','B+','B-','AB+','AB-'
      ];

      $marrital_statuses = [
        'Single','Married','Divorce','Cancel','Engaged','Separate'
      ];

      $wife_statues = [
        'First Wife','Second Wife','Third Wife','Forth Wife'
      ];

      $tribes = [
        'Hausa','Fulfulde','Yoruba','Chlela'
      ];
      
      $genders = [
        'Male','Female','Other'
      ];
      
      $images = ['male.png','female.png'];

      foreach ($bloods as $blood) {
        BloodGroup::firstOrCreate(['name'=>$blood]);
      }

      foreach ($genotypes as $genotype) {
        Genotype::firstOrCreate(['name'=>$genotype]);
      }
      
      foreach ($images as $image) {
        Image::firstOrCreate([
          'name'=>$image
        ]);
      }
      
      foreach ($marrital_statuses as $marrital_status) {
        MaritalStatus::firstOrCreate([
          'name'=>$marrital_status
        ]);
      }
      
      foreach ($wife_statuses as $wife_status) {
        Status::firstOrCreate([
          'name'=>$wife_status
        ]);
      }

      foreach ($genders as $gender) {
        Gender::firstOrCreate([
          'name'=>$gender
        ]);
      }
      
      foreach ($tribes as $tribe) {
        Tribe::firstOrCreate([
          'name'=>$tribe
        ]);
      }
    }
}
