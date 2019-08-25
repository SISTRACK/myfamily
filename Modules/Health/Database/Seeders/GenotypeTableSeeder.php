<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Profile\Entities\Genotype;

class GenotypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $genotypes =[
            'SS','AS','AA'
        ];
        foreach ($genotypes as $genotype) {
            Genotype::firstOrCreate(['name'=>$genotype]);
        }
    }
}
