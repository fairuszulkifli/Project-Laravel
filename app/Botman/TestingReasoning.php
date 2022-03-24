<?php

namespace App\Botman;

use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;

class TestingReasoning extends Conversation
{
   

    public function askName()
    {
        $this->ask(' What is your name?', function(Answer $answer) {
            $this->$name = $answer->getText();
            $this->say('Nice to meet you '.$this->$name);
            $this->askAge();
        });
    }

    public function askAge()
    {
        $this->ask(' What is your age?', function(Answer $answer) {
            $this->age = $answer->getText();
                if ($this->age <= 18) {
                    $this->say("We assign you as a tenager because your age = ".$this->age." years old");
                }else{
                    $this->say("We assign you as a adult because your age = ".$this->age." years old");
                }
        });
  
    }
  
   
    public function run()
    {
        // This will be called immediately
        $this->askName();
    }
}