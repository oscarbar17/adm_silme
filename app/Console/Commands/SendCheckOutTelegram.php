<?php

namespace App\Console\Commands;

use App\Models\Check;
use App\Models\Empleado;
use Carbon\Carbon;
use Telegram;
use Illuminate\Console\Command;

class SendCheckOutTelegram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send_check_out';

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
        $this->info("Starting...". Carbon::now());
        $checks = Check::where('created_at','>=',Carbon::now()->format('Y-m-d'))
                ->whereNotNull('ch_check_out')
                ->with(['empleado','sucursal'])
                ->get();

        $content = "<b>-- NOTIFICACION DE CHECKOUTS --</b>\n";
        
        foreach($checks as $check){
            // -- Notifica por Telegram
            $content .= 'Empleado: '. $check->empleado->em_nombre. " ". $check->empleado->em_apellido_paterno. " ". $check->empleado->em_apellido_materno . "\n";
            $content .= 'Sucursal: '. $check->sucursal->su_nombre. "\n";
            $content .= "CheckIn: ". $check->ch_check_in. "\n";
            $content .= "CheckOut: ". $check->ch_check_out. "\n";
            $content .= "*****\n\n";

        }

        if($checks->count() > 0){
            
            $this->info("Enviando..." . $checks->count());
            Telegram::sendMessage([
                'chat_id' => env("TELEGRAM_CHANNEL_ID"),
                'parse_mode' => 'HTML',
                'text' => $content
            ]);
        }

        $this->info("Ending...". Carbon::now());
    }
}
