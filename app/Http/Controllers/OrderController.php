<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\repositoryInterface\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    private  $OrderRepository;

    public function __construct(OrderRepositoryInterface  $OrderRepository){
        $this->OrderRepository=$OrderRepository;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'shop_id'=>'required',
            'status' => 'required|string|in:pending,confirmed,cancelled',
            'total' => 'required|numeric|min:0',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();

        $orders = $this->OrderRepository->create($validatedData, $userId);

        return response()->json(['message' => 'Order created', 'orders' => $orders],201);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $userId = Auth::id();

        $orders = $this->OrderRepository->show($userId);

        return response()->json(['message' => 'User orders retrieved successfully', 'orders' => $orders], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if($this->OrderRepository->delete($request['id'])){
            return response()->json(['message' => 'Order deleted successfully'], 201);
        }
    }

    public function confirmation(Request $request){
         // Validate the input data
         $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'status' => 'required|string|in:confirmed,cancelled',
        ]);

        $order = $this->OrderRepository->confirmation($validatedData);

        return response()->json(['message' => 'order has been submitted', 'order' => $order],201);
    }

    public function showDetails($id){

        $order = $this->OrderRepository->showDetails($id);

        return response()->json(['message' => 'order details', 'order' => $order],201);
    }
}
