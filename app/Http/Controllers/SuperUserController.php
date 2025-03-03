<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'firstName'=>'required|max:255',
            'lastName'=>'required|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            'phone'=>'required|unique:users',
            'address'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif'
        ]);

        $data['activity'] = 'active';

        $this->AdminRepository->Register($data);

        return redirect()->route('viewUsers');

    }

    public function deleteAdmin($id){
        $admin = User::find($id);

        $admin->delete();

        return redirect()->route('viewUsers');
    }

    public function blockUser($id){
        $user = User::find($id);

        $user->activity = 'inactive';
        $user->save();

        return redirect()->route('viewUsers');
    }

    public function unblockUser($id){
        $user = User::find($id);

        $user->activity = 'active';
        $user->save();

        return redirect()->route('viewUsers');
    }

    public function viewShops(){
        $shops=$this->AdminRepository->viewShops();
        return view('pages.shops', compact('shops'));
    }

    public function viewUsers(){
        $users = $this->AdminRepository->viewUsers();
        
        return view('pages.users', compact('users'));
    }
    //make it only for the super admin
    public function createShop(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'address' => 'required|string',
            'phonenumber' => 'required',
            'adminOption' => 'required|string',
        ]);

        $this->AdminRepository->createShop($validatedData);

        return redirect()->route('viewShops');
    }

    public function addShop(){
        $admins = User::Role('admin')->whereDoesntHave('shop')->get();
        return view('pages.addShop', compact('admins'));
    }

    // make it only for super user
    public function updateShop(Request $request, $id){
        // Validate the data (optional but recommended)
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'string',
            'phonenumber' => 'string',
        ]);

        $shop = $this->AdminRepository->updateShop($validatedData,$id);

        response()->json(['message' => 'Shop updated successfully', 'shop' => $shop], 201);
    }

    //make it only for super user
    public function destroyShop($id)
    {
        if($this->AdminRepository->deleteShop($id)){
            return redirect()->route('viewShops');
        }
    }

}
