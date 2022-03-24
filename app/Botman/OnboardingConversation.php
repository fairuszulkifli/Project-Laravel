<?php

namespace App\Botman;

use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Botman\TestingReasoning;


class OnboardingConversation extends Conversation
{
 

    public function askName()
    {
        $this->ask('What is your name?', function(Answer $answer) {
            // Save result
            $this->name = $answer->getText();
            $this->say('Nice to meet you '.$this->name);
            $this->askAge();
        });
    }

    public function askAge()
    {
        $this->ask(' What is your age?', function(Answer $answer) {
            $this->age = $answer->getText();
                if ($this->age <= 17) {
                    $this->say("We assign you as a tenager because your age = ".$this->age." years old");
                }else{
                    $this->say("We assign you as a adult because your age = ".$this->age." years old");
                }
                $this->askEmail();
               // $this->bot->startConversation(new TestingReasoning());
        });
  
    }

    public function askEmail()
    {
        $this->ask('What is your email address?', function(Answer $answer) {
            // Save result
            $this->email = $answer->getText();
            $this->say('Great - that is all we need, '.$this->name);
            $this->askMood();
        });
    }

    public function askMood()
        {
            $this->ask('How are you today?', function (Answer $response) {
                $this->say('Cool - glad that you said ' . $response->getText());
                $this->askHelp();
            });
        }

    
    public function askHelp()
    {
        $this->ask('How can I help you?', function(Answer $answer) {
            // Save result
            $this->query = $answer->getText();
            $this->say('Your query has been forwarded.');
            $this->askForActivity();
        });
    }

   
    public function askForActivity()
    {
        $question = Question::create('This is suggestion for next activity?')
            ->fallback('Unable to create a new database')
            ->callbackId('create_database')
            ->addButtons([
                Button::create('Take "Mathematic exercise"')->value('yes'),
                Button::create('Take "Science exercercise"')->value('no'),
            ]);
    
        $this->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
                $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
            }
        });
        //$this->askImage();
    }

    
    public function askImage()
        {
            $this->askForImages(' Please send me a picture of you', function ($images){
                $this->say('Thank you - I received' .count($images). 'images');
            }, function() {
                $this->say( 'Umm this does not look like a valid image to me');    
            });
        }
        

    public function run()
    {
        // This will be called immediately
        $this->askName();
    }
}