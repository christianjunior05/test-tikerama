<?php
namespace App\Service;

use App\Models\Order;
use App\Models\OrderIntent;
use Illuminate\Support\Arr;

class CreateOrderService
{
    public function execute(array $input, OrderIntent $orderIntent) : Order
    {
        return Order::create([
            'order_number' => 'ORD-' . time(),
            'order_event_id' => $orderIntent->order_intent_event_id,
            'order_price' => $orderIntent->order_intent_price,
            'order_type' => $orderIntent->order_intent_type,
            'order_payment' => Arr::get($input, 'order_payment'),
            'order_info' => Arr::get($input, 'order_info'),
        ]);
    }
}
