<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Jenssegers\Agent\Agent;
use App\Models\LoginLog;

class LogSaver
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $userId = $event->user->id;
        $agent = new Agent();
        $platform = $agent->platform();
        $pversion = $agent->version($platform);
        $browser = $agent->browser();
        $bversion = $agent->version($browser);
        $ip = $event->request->ip();
        try {
            $client = new \GuzzleHttp\Client(['verify' => false]);
            //$response = $client->request('GET', 'http://ip-api.com/json/' . $ip . '?fields=status,query,continent,country,regionName,region,city,zip,lat,lon,isp,org,mobile,proxy,timezone');
            //$response = $response->getBody();
            LoginLog::query()->create([
                'lol_user_id' => $userId,
                'lol_platform' => $platform . ' | ' . $pversion,
                'lol_browser' => $browser . ' | ' . $bversion,
                'lol_ip' => $ip,
                'lol_geolocation' => '{}'
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
