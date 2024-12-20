<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FcmController extends Controller
{
    protected $messaging;

    public function __construct()
    {
        $firebase = (new Factory)->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')));

        $this->messaging = $firebase->createMessaging();
    }

    public function sendNotification($deviceToken, $title, $body, array $data = []){
        $notification = Notification::create($title, $body);

        $message = CloudMessage::withTarget('token', $deviceToken)->withNotification($notification)->withData($data);

        return $this->messaging->send($message);
    }
}
