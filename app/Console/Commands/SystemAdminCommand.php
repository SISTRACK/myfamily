<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Hash;

use Modules\Address\Entities\State;

class SystemAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:admins-generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will generate all the system admins';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function createUser($object, $role,$type)
    {
        $object->admin()->firstOrCreate([
            'first_name'=> 'Admin',
            'last_name' => 'Admin',
            'email' => strtolower(str_replace(['/','-',' ','`'],'',$object->name.$type)).'@family.com',
            'password' =>Hash::make(strtolower(str_replace(['/','-',' ','`'],'',$object->name.$type))),
            'role_id' => $role,
            'phone' => '00000000000'
        ]);
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(37);
        
        $bar->setBarWidth(100);

        $bar->start();

        foreach(State::all() as $state){

            $bar->advance();

            $this->createUser($state,2,'state');

            foreach ($state->lgas as $lga) {

                $this->createUser($lga,3,'lga');

                foreach ($lga->districts as $district) {

                   $this->createUser($district,4,'district');

                }

            }

        }

        $bar->finish();
        info('all users are generated successfully');
    }
}
