<?php

namespace App\Listeners;

use App\Events\FundsDeposited;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseUserBalance
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
    public function handle(FundsDeposited $event): void
    {
        $user = $event->user;
        $user->balance += $event->amount;
        $user->save();
    }
}
