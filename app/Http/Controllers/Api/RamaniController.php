<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\User;

class RamaniController extends Controller
{
  public function ping()
  {
    return [
      "ping"  => "pong"
    ];
  }

  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'email'     => 'required|email|unique:users|max:200',
      'password'  => 'required|string|min:6|max:32|confirmed',
      'password_confirmation' => 'required|string|same:password'
    ]);
    
    if ($validator->fails()) {
      return $validator->errors();
    }else{

      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);

      if($user->save()){
        return [
          "status" => "register success",
          "resObj" => $user          
        ];
      }else{
        return [
          "status" => "register failed"
        ];
      }
    }
  }

  public function login(Request $request)
  {
    $credential = $req->only('email', 'password');

    $validator = Validator::make($credential, [
      'email'    => 'required|email',
      'password' => 'required'
    ]);

    if($validator->fails()){
      return $validator->errors();
    }

    try{

    }catch(Exception $e){
      
    }
  }
}