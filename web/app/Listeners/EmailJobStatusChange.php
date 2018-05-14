<?php

namespace App\Listeners;

use App\Events\JobStatusChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailJobStatusChange
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
     * @param  JobStatusChanged  $event
     * @return void
     */
    public function handle(JobStatusChanged $event)
    {
        //
    }
}
