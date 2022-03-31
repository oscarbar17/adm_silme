<?php

namespace App\Console\Commands;

use App\Models\Check;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CloseChecks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:close_checks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        Check::where('created_at','>=',Carbon::now()->format('Y-m-d'))
                ->where('ch_estatus','ABIERTO')
                ->update([
                    'ch_estatus'    => 'CERRADO_SISTEMA'
                ]);

        
        return 0;
    }
}
