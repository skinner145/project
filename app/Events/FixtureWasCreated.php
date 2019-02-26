<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;


class FixtureWasCreated
{
    use Dispatchable, SerializesModels;

    public $fixture;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($fixture)
    {
        $this->fixture = $fixture;
    }

}
