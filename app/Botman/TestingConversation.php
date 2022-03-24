<?php

namespace App\Botman;


use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

class TestingConversation extends Conversation
{

    protected $name;

    public function askName()
    {
        $this->ask('Hi! What is your name?', function(Answer $answer) {
            // Save result
            $this->name = $answer->getText();
            $this->say('Nice to meet you '.$this->name);
        });
    }


  
    public function run()
    {
        // This will be called immediately
        $this->askName();
    }
}