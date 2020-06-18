<?php

namespace App\Listeners;

use App\Country;
use App\Events\Redirected;
use App\ShortLinkCountry;
use App\UserAgent;
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
        $userAgent = UserAgent::firstOrNew([
            'short_link_id' => $event->short_link->id,
            'user_agent' => $event->request->header('user-agent', null),
        ], [
            'count' => 0,
        ]);
        $userAgent->count++;
        $userAgent->save();

        // Save country redirect visit count

        $country = Country::where('iso_code', geoip($event->request->ip())->iso_code)->first();
        $shortLinkCountry = ShortLinkCountry::firstOrNew([
            'country_id' => $country->id,
            'short_link_id' => $event->short_link->id
        ], [
            'visits' => 0
        ]);

        $shortLinkCountry->visits++;
        $shortLinkCountry->save();
    }
}
