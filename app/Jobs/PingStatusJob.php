<?php

namespace App\Jobs;

use App\Events\BroadcastStatusChangedEvent;
use App\Models\Monitor;
use App\Notifications\SiteDownNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PingStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Monitor $monitor)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->monitor->site_url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        $response = curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $newStatus = $httpCode >= 200 && $httpCode < 400;

        $statusChanged = $this->monitor->status != $newStatus;
        if ($statusChanged) {
            event(new BroadcastStatusChangedEvent($this->monitor->id, $newStatus));
        }

        if (! $newStatus) {
            $this->monitor->user->notify(new SiteDownNotification($this->monitor));
        }

        $this->monitor->update([
            'status'        => $newStatus,
            'response'      => $response,
            'response_code' => $httpCode,
        ]);
    }
}
