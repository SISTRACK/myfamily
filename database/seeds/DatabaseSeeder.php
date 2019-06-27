<?php

use Illuminate\Database\Seeder;
use Modules\Marriage\Entities\Status;
use Modules\Family\Entities\Tribe;
use Modules\Profile\Entities\MaritalStatus;
use Modules\Profile\Entities\Genotype;
use Modules\Gallary\Entities\AlbumType;
use Modules\Gallary\Entities\AlbumContentType;
use Modules\Profile\Entities\BloodGroup;
use Modules\Profile\Entities\Gender;
use Modules\Profile\Entities\Image;
use Modules\Admin\Entities\AdminStatus;
use Modules\Admin\Entities\Admin;
use Modules\Health\Entities\Doctor;
use Modules\Education\Entities\Teacher;
use Modules\Security\Entities\Police;


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

      $admins = [
        'Super',
        'Intermediate',
        'State Cooditaor',
        'Lga Cooditaor',
        'Town Cooditaor',
        'Area Cooditaor'
      ];
      $albums = [
        'Private',
        'Nuclear Family',
        'Extended Family'
      ];
      $album_contents = [
        'Audio',
        'Photo',
        'Vedio'
      ];
      $bloods = [
        '0+','0-','A+','A-','B+','B-','AB+','AB-'
      ];

      $marrital_statuses = [
        'Single','Married','Divorce','Cancel','Engaged','Separate'
      ];

      $wife_statuses = [
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
      foreach ($albums as $album) {
        AlbumType::firstOrCreate(['name'=>$album]);
      }
      foreach ($album_contents as $album_content) {
        AlbumContentType::firstOrCreate(['name'=>$album_content]);
      }
      foreach ($genotypes as $genotype) {
        Genotype::firstOrCreate(['name'=>$genotype]);
      }
      
      foreach ($images as $image) {
        Image::firstOrCreate([
          'name'=>$image
        ]);
      }

      foreach ($admins as $admin) {
        AdminStatus::firstOrCreate([
          'name'=>$admin
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

      $user = Admin::firstOrCreate([
        'email'=>'admin@family.com',
        'password'=>Hash::make('admin'),
        'phone'=>'08162463010',
        'first_name'=>'super',
        'last_name'=>'admin',
        'role_id'=>1,
      ]);

      $user = Doctor::firstOrCreate([
        'email'=>'health@family.com',
        'password'=>Hash::make('health'),
        'phone'=>'08162463010',
        'first_name'=>'isah',
        'last_name'=>'labbo',
        'role_id'=>1,
      ]);

      $user = Teacher::firstOrCreate([
        'email'=>'education@family.com',
        'password'=>Hash::make('education'),
        'phone'=>'08162463010',
        'first_name'=>'isah',
        'last_name'=>'labbo',
        'role_id'=>1,
      ]);
      $user = Police::firstOrCreate([
        'email'=>'security@family.com',
        'password'=>Hash::make('security'),
        'phone'=>'08162463010',
        'first_name'=>'isah',
        'last_name'=>'labbo',
        'role_id'=>1,
      ]);
    }
}
