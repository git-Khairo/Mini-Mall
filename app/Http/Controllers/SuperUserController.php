<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\repositoryInterface\AdminRepositoryInterface;
use Illuminate\Http\Request;

class SuperUserController extends Controller
{
    private $AdminRepository;

    public function __construct(AdminRepositoryInterface $AdminRepository)
    {
        $this->AdminRepository = $AdminRepository;
    }
    public function Admin(Request $request){

        $data=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            'phone'=>'required|unique:users|numeric',
            'address'=>'required',
            'image'=>'required'
        ]);

        $user=$this->AdminRepository->Register($data);

        return;

    }

    public function viewShop(){

        $shops=$this->AdminRepository->viewShops();
        return ;
    }

    public function edit(Shop $shop)
    {

        return view('pages.Edit',compact('shop'));
    }
    public function viewUser(){
        $shop=$this->AdminRepository->viewUsers();

        return ;
    }
    //make it only for the super admin
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

    // make it only for super user
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

    //make it only for super user
    public function destroyShop($id)
    {
        if($this->AdminRepository->deleteShop($id)){
            response()->json(['message' => 'Shop deleted successfully'], 201);
        }
    }

}
