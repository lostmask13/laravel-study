<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\LoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(UserLoggedIn $event): void
    {
        $entry = new LoginHistory();
        $entry->user_id = $event->user->id;
        $entry->created_at = new \DateTime();
        $entry->ip = $event->request->ip();
        $entry->save();
    }
}
