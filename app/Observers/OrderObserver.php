<?php

namespace App\Observers;

use App\Models\Order;
use App\Services\FcmService;

class OrderObserver
{
    // protected $fcmController;

    // public function __construct(FcmService $fcmController)
    // {
    //     $this->fcmController = $fcmController;
    // }

    // public function updated(Order $order)
    // {
    //     if (in_array($order->status, ['confirmed', 'cancelled'])) {
    //         $deviceToken = $order->user->device_token;
    //         $title = "Order Update";
    //         $body = "Your order has been {$order->status}";

    //         $this->fcmController->sendNotification($deviceToken, $title, $body, ['order_id' => $order->id]);
    //     }
    // }
}
