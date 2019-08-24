<?php

use Illuminate\Database\Seeder;
use Modules\Health\Database\Seeders\HealthDatabaseSeeder;
use Modules\Profile\Database\Seeders\ProfileDatabaseSeeder;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Security\Database\Seeders\SecurityDatabaseSeeder;
use Modules\Marriage\Database\Seeders\MarriageDatabaseSeeder;
use Modules\Gallary\Database\Seeders\GallaryDatabaseSeeder;
use Modules\Education\Database\Seeders\EducationDatabaseSeeder;

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
      $this->call(MarriageDatabaseSeeder::class);
      $this->call(EducationDatabaseSeeder::class);
      $this->call(GallaryDatabaseSeeder::class);
      $this->call(AdminDatabaseSeeder::class);
  }
}
