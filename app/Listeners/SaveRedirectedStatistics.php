<?php

namespace App\Listeners;

use App\Country;
use App\Events\Redirected;
use App\Ip;
use App\ShortLinkCountry;
use App\ShortLinkIp;
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
        /**
         * @todo IP forwarded should be detected here and analized
         */
        
        $ip = $event->request->header('x-real-ip', null) ?? $event->request->header('x-forwarded-for', null) ?? $event->request->ip();

        /**
         * Save user-agent
         */
        $userAgent = UserAgent::firstOrNew([
            'short_link_id' => $event->short_link->id,
            'user_agent' => $event->request->header('user-agent', null),
        ], [
            'count' => 0,
        ]);
        $userAgent->count++;
        $userAgent->save();

        /**
         *  Save country redirect visit count
         */
        $country = Country::where('iso_code', geoip($ip)->iso_code)->first();
        $shortLinkCountry = ShortLinkCountry::firstOrNew([
            'country_id' => $country->id,
            'short_link_id' => $event->short_link->id
        ], [
            'visits' => 0
        ]);
        $shortLinkCountry->visits++;
        $shortLinkCountry->save();

        /**
         * Save ip with hidden last two octaves
         */
        $ipHidden = preg_replace('~(\d+)\.(\d+)\.(\d+)\.(\d+)~', "$1.$2.x.x", $ip);
        $ipModel = Ip::firstOrCreate(['ip' => $ipHidden]);
        $shortLinkIp = ShortLinkIp::firstOrNew([
            'ip_id' => $ipModel->id,
            'short_link_id' => $event->short_link->id
        ], [
            'visits' => 0
        ]);

        $shortLinkIp->visits++;
        $shortLinkIp->save();
    }
}
