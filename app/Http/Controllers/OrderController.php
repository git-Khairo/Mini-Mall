<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
            'shop_id' => 'required',
            'status' => 'required|string|in:pending,confirmed,cancelled',
            'total' => 'required|numeric|min:0',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);
    
        $products = $validatedData['products'];
        
        // Check product availability and adjust stock
        foreach ($products as $productData) {
            $product = Product::find($productData['id']);
    
            if ($product->amount < $productData['quantity']) {
                return response()->json(['message' => "Insufficient stock for product ID: {$product->id}",], 400);
            }
    
            // Decrease product stock
            $product->amount -= $productData['quantity'];
            $product->save();
        }
    
        // Get authenticated user ID
        $userId = Auth::id();
    
        // Create the order
        $orders = $this->OrderRepository->create($validatedData, $userId);
    
        return response()->json(['message' => 'Order created','orders' => $orders], 201);
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


    public function showDetails($id){

        $order = $this->OrderRepository->showDetails($id);

        return response()->json(['message' => 'order details', 'order' => $order],201);
    }

    public function delete($id){
        $this->OrderRepository->delete($id);

        return response()->json(['message' => 'Order Deleted'], 201);
    }
}
