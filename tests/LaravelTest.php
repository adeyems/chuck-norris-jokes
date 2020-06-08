<?php

namespace Adeyems\ChuckNorrisJokes\Tests;

use Adeyems\ChuckNorrisJokes\ChuckNorrisJokesServiceProvider;
use Adeyems\ChuckNorrisJokes\Facades\ChuckNorris;
use Adeyems\ChuckNorrisJokes\Models\ChuckNorrisJoke;
use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ChuckNorrisJokesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ChuckNorris' => ChuckNorris::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__.'/../database/migrations/create_chuck_norris_jokes_table.stub.php';

        (new \CreateChuckNorrisJokesTable())->up();
    }

    public function test_chuck_norris_jokes_command_returns_a_command()
    {
        $this->withoutMockingConsoleOutput();

        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->artisan('chuck-norris');

        $output = Artisan::output();

        $this->assertSame('some joke'.PHP_EOL, $output);
    }

    public function test_route_can_be_accessed()
    {
        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->get('chuck-norris')
            ->assertViewIs('chuck-norris::joke')
            ->assertViewHas('joke', 'some joke')
            ->assertStatus(200);
    }

    public function test_it_can_access_the_database()
    {
        $joke = new ChuckNorrisJoke();
        $joke->setAttribute('joke', 'this is very funny');
        $joke->save();

        $newJoke = ChuckNorrisJoke::find($joke->getAttribute('id'));

        $this->assertSame($newJoke->getAttribute('joke'), 'this is very funny');
    }
}
