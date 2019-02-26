<?php

namespace App\Listeners;

use App\Mail\FixtureCreated;
use App\Events\FixtureWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendFixtureWasCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FixtureWasCreated  $event
     * @return void
     */
    public function handle(FixtureWasCreated $event)
    {
      \Mail::to($event->fixture->user->email)->send(
        new FixtureCreated($event->fixture)
      );
    }
}
