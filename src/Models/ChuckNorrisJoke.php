<?php

namespace Adeyems\ChuckNorrisJokes\Models;

use Illuminate\Database\Eloquent\Model;

class ChuckNorrisJoke extends Model {

    protected $table = 'chuck-norris-jokes';

    protected $guarded = [];
    /**
     * @var string
     */
    private $joke;

    public function setJoke(string $joke){
        $this->joke = $joke;
    }
}