<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Category;
use App\Models\product;
use App\Models\User;
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
            $id=Auth::id();
            $user=User::find($id);
           if($user->hasRole('admin'))
            return redirect()->route('viewOrders');
           else
               return ;
        }else{
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records'
            ]);
        }
    }

    public function viewOrders()
    {
        //if()
        $orders = $this->AdminRepository->viewOrders();

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

    public function  index(){

        $products = $this->AdminRepository->viewProducts();

        return ;

    }

    public function edit(product $product)
    {
        $category = category::find($product->Category_id);
        return view('pages.Edit',compact('product','category'));
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }
}
