<?php


namespace Qudus\ChuckNorrisJokes\Facades;


use Illuminate\Support\Facades\Facade;

class ChuckNorris extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'chuck-norris';
    }

}