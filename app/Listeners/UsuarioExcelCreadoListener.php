<?php

namespace App\Listeners;

use App\Events\UsuarioExcelCreadoEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UsuarioExcelMail;

class UsuarioExcelCreadoListener
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
     * @param  UsuarioExcelCreadoEvent  $event
     * @return void
     */
    public function handle(UsuarioExcelCreadoEvent $event)
    {
        $user = $event->user;
        //dd($user);
        Mail::to($user->email)->send(new UsuarioExcelMail($user));
    }
}
