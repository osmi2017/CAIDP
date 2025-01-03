<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\croneController;

class ValiditeAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'validite:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoyez un mail de notification a chaque expiration de delais';

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
        \Log::info("Cron is working fine!");
        $croneController = new croneController;
        $croneController->allDemande();
    }
}
