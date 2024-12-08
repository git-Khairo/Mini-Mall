<?php

namespace App\Http\Controllers;

use App\repositoryInterface\AdminRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private $AdminRepository;

    public function __construct(AdminRepositoryInterface $AdminRepository)
    {
        $this->AdminRepository = $AdminRepository;
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($fields)){
            return redirect()->route('viewOrders');
        }else{
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records'
            ]);
        }
    }

    public function viewAllOrders()
    {
        $orders = $this->AdminRepository->viewAllOrders();

        return view('pages.orders', ['orders' => $orders, 'option' => 'all']);
    }

    public function deleteOrder($id){
        $order = $this->AdminRepository->deleteOrder($id);

        return;
    }

    public function orderConfirmation(Request $request,$id){
        $validatedData = $request->validate([
            'status' => 'in:confirmed,cancelled',
        ]);

        $order = $this->AdminRepository->orderConfirmation($validatedData, $id);

        return;
    }

    public function createShop(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string',
            'phonenumber' => 'required|integer',
        ]);

        $shop = $this->AdminRepository->createShop($validatedData);

        return;
    }

    public function updateShop(Request $request, $id){
        // Validate the data (optional but recommended)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string',
            'phonenumber' => 'required|integer',
        ]);

        $shop = $this->AdminRepository->updateShop($validatedData,$id);

        response()->json(['message' => 'Shop updated successfully', 'shop' => $shop], 201);
    }

    public function destroyShop($id)
    {
        if($this->AdminRepository->deleteShop($id)){
            response()->json(['message' => 'Shop deleted successfully'], 201);
        }
    }

    public function createProduct(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'amount' => 'required|integer',
            'category' => 'required|string|max:255',
            'shop' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = $this->AdminRepository->createProduct($validatedData);

        return;
    }

    public function updateProduct(Request $request, $id){
        // Validate the data (optional but recommended)
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'amount' => 'required|integer',
            'category' => 'required|string|max:255',
            'shop' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = $this->AdminRepository->updateProduct($validatedData,$id);

        return;
    }

    public function destroyProduct($id)
    {
        if($this->AdminRepository->deleteProduct($id)){
            return;
        }
    }
}
