<?php

use Illuminate\Database\Seeder;
use Modules\Marriage\Entities\Status;
use Modules\Gallary\Entities\AlbumType;
use Modules\Gallary\Entities\AlbumContentType;
use Modules\Admin\Entities\AdminStatus;
use Modules\Admin\Entities\Admin;
use Modules\Health\Entities\Doctor;
use Modules\Education\Entities\Teacher;
use Modules\Security\Entities\Security;
use Modules\Government\Entities\Government;
use Modules\Security\Entities\CourtType;
use Modules\Security\Entities\PoliceStationType;
use Modules\Education\Entities\SchoolType;
use Modules\Security\Entities\CourtCategory;
use Modules\Security\Entities\PoliceStationCategory;
use Modules\Education\Entities\SchoolCategory;
use Modules\Education\Entities\SchoolReportType;

use Modules\Health\Database\Seeders\HealthDatabaseSeeder;
use Modules\Profile\Database\Seeders\ProfileDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(ProfileDatabaseSeeder::class);
      $this->call(HealthDatabaseSeeder::class);
      $this->call(SecurityDatabaseSeeder::class);
      
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
      

      $marrital_statuses = [
        'Single','Married','Divorce','Cancel','Engaged','Separate'
      ];

      $wife_statuses = [
        'First Wife','Second Wife','Third Wife','Forth Wife'
      ];

      
      
      
      
      
      $school_categories = ['Government','Private'];

      $school_types = [
        'Nursery',
        'Primary', 
        'Secondary',
        'Polytechnic',
        'Collage of Education',
        'Nursing',
        'University',
      ];

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
      foreach ($school_types as $school_type) {
        SchoolType::firstOrCreate(['name'=>$school_type]);
      }
      foreach ($school_categories as $school_category) {
         SchoolCategory::firstOrCreate(['name'=>$school_category]);
      }
      

      foreach ($albums as $album) {
        AlbumType::firstOrCreate(['name'=>$album]);
      }
      foreach ($album_contents as $album_content) {
        AlbumContentType::firstOrCreate(['name'=>$album_content]);
      }
      
      foreach ($admins as $admin) {
        AdminStatus::firstOrCreate([
          'name'=>$admin
        ]);
      }
      foreach ($wife_statuses as $wife_status) {
        Status::firstOrCreate([
          'name'=>$wife_status
        ]);
      }
}
