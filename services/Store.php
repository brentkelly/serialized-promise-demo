<?php
namespace Services;

use Opis\Closure\SerializableClosure;

class Store {
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Store the deferred instance for later use
     *
     * @param \React\Promise\Deferred
     */
    public function store($deferred)
    {
        // write to a file
        file_put_contents(
            $this->filename(),
            \Opis\Closure\serialize($deferred)
        );
    }

    /**
     * Retrieve the stored closure (wrapper to resolve)
     *
     * @return Closure
     */
    public function retrieve()
    {
        // read the file
        $serialized = file_get_contents($this->filename());

        // unserialize & execute the closure (resolving the promise)
        return \Opis\Closure\unserialize($serialized);
    }

    /**
     * Generate filename / path for this id
     */
    public function filename()
    {
        return __DIR__ . '/../guests/guest_' . $this->id;
    }
}