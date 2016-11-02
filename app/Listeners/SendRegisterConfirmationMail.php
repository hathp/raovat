<?php

namespace Hoster\Listeners;

use Hoster\Events\UserWasRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegisterConfirmationMail
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasRegistered  $event
     * @return void
     */
    public function handle(UserWasRegistered $event)
    {
        $user = $event->getUser();

        \Log::debug('User '. $user->email . ' was registered at '. date('d/m/y H:i:s'));

        \Mail::raw("Link kích hoạt tài khoản: ". route('front.auth.confirm', [$user->id, $user->confirmation_token]), function($message) {
            $message->from('trungtv@hoster.vn', 'Việt Trung');
            $message->to('tranviettrung92@gmail.com');
        });
    }
}
