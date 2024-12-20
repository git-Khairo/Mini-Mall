<?php

namespace App\repository;

use App\Models\User;
use App\repositoryInterface\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepository implements UserRepositoryInterface
{
   public function Register(array $data)
   {
       $user=User::create($data);

       $userRole = Role::firstOrCreate(['name' => 'user']);  // New user role

       $user->assignRole($userRole);

       $token=$user->createToken($user->firstName.$user->lastName)->plainTextToken;

       $response=[
         'user' =>$user,
         'token' =>$token
       ];

       return $response;
   }

   public function login(array $data){


       $user=User::where('email',$data['email'])->first();
        if(!$user){
          $user=User::where('phone',$data['email'])->first();
        }
       if(!$user||!Hash::check($data['password'],$user->password)){
           return [
             'message'=>'wrong password or Email'
           ];
       }
       $token=$user->createToken($user->firstName.$user->lastName)->plainTextToken;

       $response=[
           'user' =>$user,
           'token' =>$token
       ];

       return $response;
   }

   public function getUser($userId){
    $user = User::find($userId);
    
    return $user;
   }

}
