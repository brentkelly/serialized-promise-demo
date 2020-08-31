<?php
namespace Services;

use React\Promise\Deferred;

class Guest {
    protected $id;
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;

        $this->id = uniqid();
    }

    /**
     * Welcome a new guest, return their id so we can farewell them correctly later
     */
    public function welcome()
    {
        $this->hello();

        // generate a promise of "goodbye"
        $deferred = new Deferred();
        $deferred->promise()
            ->then(function($status) {
                echo $this->goodbye($status);
            });

        // store the promise for later
        (new Store($this->id))
            ->store($deferred);

        return $this->id;
    }

    protected function hello()
    {
        echo "Hi $this->name!\n";
    }

    protected function goodbye($status)
    {
        echo "Goodbye $this->name. I hope you had a $status time!\n";

        return $this;
    }
}