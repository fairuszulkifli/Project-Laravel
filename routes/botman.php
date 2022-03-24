<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

//image fetch
$botman->hears('image',function ($bot){
    $image = new Image("https://otman.io/img/logo.png");
    $message = OutgoingMessage::create("");
    $bot->reply($message);
});

//fallback conversation
$botman->fallback(function($bot){
        $bot->reply("soryy i cant understand");

});

$botman->hears('Start conversation', BotManController::class.'@startConversation');
