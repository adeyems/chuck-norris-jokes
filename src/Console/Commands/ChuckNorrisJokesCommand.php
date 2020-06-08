<?php

namespace Adeyems\ChuckNorrisJokes\Console\Commands;

use Adeyems\ChuckNorrisJokes\Facades\ChuckNorris;
use Illuminate\Console\Command;

class ChuckNorrisJokesCommand extends Command
{
    protected $signature = 'chuck-norris';

    protected $description = 'Write a random joke to the console';

    public function handle()
    {
        $this->info(ChuckNorris::getRandomJoke());
    }
}
