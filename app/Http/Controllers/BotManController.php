<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//script
use App\Botman\OnboardingConversation;
use App\Botman\TestingConversation;
use App\Botman\TestingReasoning;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            $botman->startConversation(new OnboardingConversation);
        });

        $botman->listen();
    }
}