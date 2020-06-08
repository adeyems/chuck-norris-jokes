<?php

namespace Adeyems\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use Adeyems\ChuckNorrisJokes\Jokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /* @test */
    public function test_it_returns_a_predefined_joke()
    {
        //$this->assertTrue(1 === 2 - 1);

        $jokes = new JokeFactory(['this is a joke']);
        $joke = $jokes->getRandomJoke();

        $this->assertSame('this is a joke', $joke);
    }

    public function test_it_returns_random_joke()
    {
        $jokesArray = [
            'Chuck Norris doesn’t read books. He stares them down until he gets the information he wants',
            'Time waits for no man. Unless that man is Chuck Norris.',
            'If you spell Chuck Norris in Scrabble, you win. Forever.',
        ];

        $jokes = new JokeFactory();
        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $jokesArray);
    }
}
