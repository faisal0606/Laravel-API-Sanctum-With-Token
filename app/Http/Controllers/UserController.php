<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function registration(Request $request){

        $request->validate([

            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
            

        ]);

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
            ]);

            //create Token 
            $token = $user ->createToken('mytoken')->plainTextToken;

              //return Token resposne 
            return response([

            'user'=>$user,
            'token' =>$token

            ],201); //201 staus 

                // 1|35j4D2QFRKnZuiNobnG2brQ4aVjmYrLiOtzuw3ox


                
    }
                // for login
                public function login(Request $request){
                    $request->validate([
                        'email' => 'required|email',
                        'password' => 'required',
                    ]);

                    $user = User::where('email', $request->email)->first();

                    if(!$user || !Hash::check($request->password, $user->password)){
                        return response([
                            'message' => 'The provided credentials are incorrect.'
                    ], 401);
                    }

                    $token = $user->createToken('mytoken')->plainTextToken;

                    return response([
                        'user' => $user,
                        'token' => $token
                    ], 200);

                }

                // logout
                public function logout(){

                    auth()->user()->tokens->each(function ($token, $key) {
                        $token->delete();
                    });
                    return response([
                        'message' => 'Logged out successfully!',
                        'status_code' => 200
                    ], 200);


                    // old way not working
                    // auth()->user()->tokens()->delete();
                    // return response([
                    //     'message' => 'Succefully Logged Out !!'
                    // ]);

                    

                }
    

    

}
