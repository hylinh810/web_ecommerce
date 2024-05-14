<?php

namespace App\Listeners;

use App\Events\ShopConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendShopConfirmationEmail
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
     * @param  \App\Events\ShopConfirmationMail  $event
     * @return void
     */
    public function handle(ShopConfirmationMail $event)
    {
        //
    }
}
