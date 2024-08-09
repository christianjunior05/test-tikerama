<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderIntent;
use Illuminate\Http\Request;
use App\Service\CreateOrderService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\OrderIntentController;
use App\Http\Requests\Order\ValidateOrderIntentRequest;

class OrderIntentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'order_intent_price' => 'required|numeric',
            'order_intent_type' => 'required|string',
            'user_email' => 'required|email',
            'user_phone' => 'required|string',
        ]);

        $orderIntent = OrderIntent::create([
            'order_intent_price' => $request->order_intent_price,
            'order_intent_type' => $request->order_intent_type,
            'user_email' => $request->user_email,
            'user_phone' => $request->user_phone,
            'expiration_date' => now()->addDay(),
        ]);

        return response()->json($orderIntent, 201);
    }

 /**
     * Validate an order intent
     * @param mixed $id
     * @return mixed
     * @throws BindingResolutionException
     */
    public function confirm(ValidateOrderIntentRequest $request, CreateOrderService  $createOrderService)
    {
        $orderIntent = OrderIntent::findOrFail($request->id);
        $order = $createOrderService->execute($request->except('order_intent_id', '__token'), $orderIntent);
        return response()->json(['message' => 'Order confirmed', 'download_url' => '...']);
    }


}