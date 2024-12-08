<?php

namespace App\repository;

use App\Models\User;
use App\repositoryInterface\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
   public function Register(array $data)
   {
       $user=User::create($data);

       $token=$user->createToken($user->name)->plainTextToken;

       $response=[
         'user' =>$user,
         'token' =>$token
       ];

       return $response;
   }

   public function login(array $data){

       $user=User::where('email',$data['email'])->first();

       if(!$user||!Hash::check($data['password'],$user->password)){
           return [
             'message'=>'wrong password or Email'
           ];
       }
       $token=$user->createToken($user->name)->plainTextToken;

       $response=[
           'user' =>$user,
           'token' =>$token
       ];

       return $response;
   }

}
