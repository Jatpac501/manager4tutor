<?php

namespace App\Listeners;

use App\Models\Timetable;
use App\Events\EventProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEventNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventProcessed $event)
    {
        dd($event);
    }
}
