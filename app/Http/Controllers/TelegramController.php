<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class TelegramController extends Controller
{
    //
    public function updatedActivity()
    {
        $activity = Telegram::getUpdates();
        dd($activity);
    }

    public function sendMessage()
    {
        $text = 'Hola.. Desde Laravel.';

        Telegram::sendMessage([
            'chat_id' => env("TELEGRAM_CHANNEL_ID"),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
    }
}
