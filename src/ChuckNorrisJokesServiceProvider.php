<?php

namespace Adeyems\ChuckNorrisJokes;

use Adeyems\ChuckNorrisJokes\Console\Commands\ChuckNorrisJokesCommand;
use Adeyems\ChuckNorrisJokes\Http\Controllers\ChuckNorrisJokesController;
use Adeyems\ChuckNorrisJokes\Jokes\JokeFactory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

/**
 * Class ChuckNorrisJokesServiceProvider.
 */
class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        ///Load Commands
        if ($this->app->runningInConsole()) {
            $this->commands([ChuckNorrisJokesCommand::class]);
        }

        //Load Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chuck-norris');

        //publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/chuck-norris'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../config/chuck-norris.php' => base_path('config/chuck-norris.php'),
        ], 'config');

        if (! class_exists('CreateChuckNorrisJokesTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_chuck_norris_jokes_table.stub.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_chuck_norris_jokes_table.php'),
            ], 'migrations');
        }
        $this->publishes([
            __DIR__.'/../database/migrations/create_chuck_norris_jokes_table.stub.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_chuck_norris_jokes_table.php'),
        ], 'migrations');

        //Load routes
        Route::get(config('chuck-norris.route'), ChuckNorrisJokesController::class);
    }

    public function register()
    {
        $this->app->bind('chuck-norris', JokeFactory::class);

        $this->mergeConfigFrom(__DIR__.'/../config/chuck-norris.php', 'chuck-norris');
    }
}
