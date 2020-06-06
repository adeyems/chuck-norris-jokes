<?php


namespace Qudus\ChuckNorrisJokes;

use Illuminate\Support\ServiceProvider;
use Qudus\ChuckNorrisJokes\Jokes\JokeFactory;

/**
 * Class ChuckNorrisJokesServiceProvider
 * @package Qudus\ChuckNorrisJokes
 */
class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot(){

    }


    /**
     *
     */
    public function register(){
        return $this->app->bind('chuck-norris', function (){
           return new JokeFactory();
        });
    }

}