<?php

namespace App\Console\Commands;

use App\Models\Check;
use App\Models\Empleado;
use App\Models\User;
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
        $users_exception = User::whereIn('rol_id',[5,6])->pluck('id');

        $empleados_exception = Empleado::whereIn('user_id',$users_exception)->pluck('empleado_id');

        Check::where('created_at','>=',Carbon::now()->format('Y-m-d'))
                ->where('ch_estatus','ABIERTO')
                ->whereNotIn('empleado_id',$empleados_exception)
                ->update([
                    'ch_estatus'    => 'CERRADO_SISTEMA'
                ]);

        
        return 0;
    }
}
