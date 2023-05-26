<?php

namespace App\MailHelper;

use App\Mail\NotificationMailer;
use Illuminate\Support\Facades\Mail;

class notificationHelper
{
    public function sendNotification($recepient, $details)
    {
        Mail::to($recepient)->send(new NotificationMailer($details));
    }
}
