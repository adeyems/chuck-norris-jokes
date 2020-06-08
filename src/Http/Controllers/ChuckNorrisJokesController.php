<?php


namespace Adeyems\ChuckNorrisJokes\Http\Controllers;


use Adeyems\ChuckNorrisJokes\Facades\ChuckNorris;
use Illuminate\Routing\Controller;

class ChuckNorrisJokesController extends Controller
{
    public function __invoke()
    {
        return view('chuck-norris::joke', ['joke' => ChuckNorris::getRandomJoke()]);
    }
}