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
            return redirect()->route('viewUsers');
        }else{
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records'
            ]);
        }
    }

    public function viewOrders()
    {
        $orders = $this->AdminRepository->viewOrders();

        return view('pages.orders', ['orders' => $orders, 'option' => 'all']);
    }

    public function deleteOrder($id){
        $this->AdminRepository->deleteOrder($id);

        return redirect()->route('viewOrders');
    }

    public function orderConfirmation(Request $request,$id){
        $validatedData = $request->validate([
            'status' => 'in:confirmed,cancelled',
        ]);

        $this->AdminRepository->orderConfirmation($validatedData, $id);

        return redirect()->route('viewOrders');
    }

    public function orderSort(Request $request){
        $validatedData = $request->validate([
            'orderType' => 'in:confirmed,cancelled,pending,all',
        ]);

        $orders = $this->AdminRepository->orderSort($validatedData);

        return view('pages.orders', ['orders' => $orders, 'option' => $validatedData['orderType']]);
    }

    public function createProduct(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'amount' => 'required|integer',
            'categoryOption' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->AdminRepository->createProduct($validatedData);

        return redirect()->route('viewProducts');
    }

    public function addProduct(){
        $categories = Category::get();
        return view('pages.addProduct', compact('categories'));
    }

    public function updateProduct(Request $request, $id){
        // Validate the data (optional but recommended)
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'price' => 'numeric',
            'amount' => 'integer',
            'categoryOption' => 'string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->AdminRepository->updateProduct($validatedData,$id);

        return redirect()->route('viewProducts');
    }

    public function editProduct(Product $product){
        $categories = Category::get();
        return view('pages.editProduct', compact('product', 'categories'));
    }

    public function destroyProduct($id){
        if($this->AdminRepository->deleteProduct($id)){
            return redirect()->route('viewProducts');
        }
    }

    public function  viewProducts(){

        $products = $this->AdminRepository->viewProducts();

        return view('pages.products',compact('products'));

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('auth.login');

    }
}
