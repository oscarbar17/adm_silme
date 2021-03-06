<?php

namespace App\Console\Commands;

use App\Models\Check;
use App\Models\Empleado;
use Carbon\Carbon;
use Telegram;
use Illuminate\Console\Command;

class SendCheckInTelegram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send_check_in';

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
        $this->info(" - STARTING - " . Carbon::now());
        $checks = Check::where('created_at','>=',Carbon::now()->format('Y-m-d'))
                ->with(['empleado','sucursal'])
                ->get();

        $content = "<b>-- NOTIFICACION DE CHECKINS --</b>\n";
        
        foreach($checks as $check){
            // -- Notifica por Telegram
            $content .= 'Empleado: '. $check->empleado->em_nombre. " ". $check->empleado->em_apellido_paterno. " ". $check->empleado->em_apellido_materno . "\n";
            $content .= 'Sucursal: '. $check->sucursal->su_nombre. "\n";
            $content .= "CheckIn: ". $check->ch_check_in;
            $content .= "\n*****\n\n";

        }

        if($checks->count() > 0){
            
            Telegram::sendMessage([
                'chat_id' => env("TELEGRAM_CHANNEL_ID"),
                'parse_mode' => 'HTML',
                'text' => $content
            ]);
        }
        $this->info(" - ENDING - " . Carbon::now());
        
    }
}
