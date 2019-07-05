<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Modules\Address\Entities\AddressHandle;

class AddressInformationUpdate extends Command
{
    use AddressHandle;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:address-generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create address information of the application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->start();
    }
}
