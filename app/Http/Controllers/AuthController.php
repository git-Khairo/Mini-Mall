<?php

namespace App\Http\Controllers;

use App\repositoryInterface\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private  $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository=$userRepository;
    }

    public function register(Request $request){
       $data=$request->validate([
            'firstName'=>'required|max:255',
            'lastName'=>'required|max:255',
            'email'=>'required|email|unique:users',
            'fcm_token'=>'nullable',
            'password'=>'required',
            'phone'=>'required|unique:users',
            'address'=>'required',
            'image'=>'nullable',
        ]);

        $data['activity'] = 'active';

        $user=$this->userRepository->Register($data);

        return response()->json(['message' => 'User registered successfully', 'user' => $user],201);
    }

    public  function login(Request $request){

        $data=$request->validate([
            'email'=>'required',
            'fcm_token'=>'nullable',
            'password'=>'required',
        ]);

        $user=$this->userRepository->Login($data);

        return response()->json(['message' => 'User logged in successfully', 'user' => $user], 201);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return [
            'message'=>'You are logged out'
        ];
    }

    public function getUser(){
        $userId = Auth::id();
        
        $user = $this->userRepository->getUser($userId);

        return response()->json(['message' => 'User successfully', 'user' => $user], 201);
    }
}
