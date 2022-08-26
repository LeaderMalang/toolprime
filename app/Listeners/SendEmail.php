<?php

namespace App\Listeners;

use App\Event\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\UserLog;
class SendEmail
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
     * @param  \App\Event\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $event->user->id;
        UserLog::create([
            'log'=>$event->user->name.' Has been Registered',
            'user_id'=>$event->user->id
        ]);
    }
}
