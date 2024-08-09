<?php

namespace App\Http\Controllers\Api;

use PDF;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderIntent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * @group Orders
 * @package App\Http\Controllers\Api
 */
class OrderController extends Controller
{
    /**
     * Create a new order
     * @param Request $request
     * @return mixed
     * @throws BindingResolutionException
     */
    public function store(Request $request)
    {

        $pdf = PDF::loadView('pdf.ticket');
        return $pdf->download('ticket.pdf');
        dd($pdf);
        $request->validate([
            'order_info' => 'required|string',
            'order_event_id' => 'required|exists:events,id',
            'order_intent_id' => 'required|exists:order_intents,id',
            "order_payment" => 'required|string',
            "order_type" => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $orderIntent = OrderIntent::find($request->order_intent_id);

        $order = Order::create([
            'order_number' => "ORD-".time().rand(1000, 9999),
            "order_info" => $request->order_info,
            "order_event_id" => $request->order_event_id,
            "order_payment" => $request->order_payment,
            "order_created_on" => now(),
            "order_type" => $request->order_type,
            "order_price" => $orderIntent->order_intent_price,
            'user_id' => $request->user_id,
        ]);

        return response()->json($order, 201);
    }

    /**
     * Affichez tous les ordres d'un utilisateur 
     * @param User $user
     * @return mixed
     * @throws BindingResolutionException
     */
    public function getUsersOrders(User $user)
    {
        $orders = $user->orders()->paginate(10);
        return response()->json($orders);
    }

    public function confirm($id)
    {
        $orderIntent = OrderIntent::findOrFail($id);
        return response()->json(['message' => 'Order confirmed', 'download_url' => '...']);
    }
    public function createOrder($orderIntentId)
    {
        // Récupérer l'intention de commande
        $orderIntent = OrderIntent::findOrFail($orderIntentId);

        // Créer une commande en associant l'intention de commande
        $order = Order::create([
            'order_intent_id' => $orderIntent->id,
            // autres champs nécessaires pour la commande
        ]);

        return response()->json($order, 201);
    }
    public function confirmOrder(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'order_intent_id' => 'required|exists:order_intents,order_intent_id',
            // autres validations si nécessaire
        ]);

        // Créer la commande
        $order = Order::create([
            'order_number' => 'ORD12345',
            'order_event_id' => 10,
            'order_price' => 1500,
            'order_type' => 'Online',
            'order_payment' => 'Credit Card',
            'order_info' => 'Livraison prévue sous 3 jours.',
            'order_created_on' => now(),
            'order_intent_id' => 1, // Si applicable
        ]);

        // Define an alias for number of pages
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->headerAttributes();
        $pdf->SetFont('Times', '', 14);

        $directory = 'path/to/directory';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $outputPath = $directory . '/filename.pdf';

        $pdf->Output('F', $outputPath);
        return response()->json(['message' => 'Order confirmed', 'url_ticket' => "C:/wamp64/www/tikerama/storage/app/public/newfile.pdf"], 201);
    }
    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
    }
}
