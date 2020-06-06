<?php

namespace App\Listeners;

use App\Events\Redirected;
use App\Statistic;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveRedirectedStatistics
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
     * @param  object  $event
     * @return void
     */
    public function handle(Redirected $event)
    {
        $stat = Statistic::firstOrCreate([
            'short_link_id' => $event->short_link->id,
            'user_agent' => $event->request->header('user-agent', null),
        ], [
            'count' => 0,
        ]);
        $stat->count++;
        $stat->save();
    }
}
