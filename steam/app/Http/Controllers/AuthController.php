<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginform()
    {
        return view('auth/login');
    }
    public function home()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            // return response()->json([
            //     'errors' => $validator->errors(),
            // ], 403);

            return redirect()->back()->with('message', 'Invalid field');
        }

        if(!Auth::attempt($request->only(['email', 'password']))){
            // return response()->json([
            //     'message' => 'Email or Password Incorrect or Empty'
            // ], 403);

            return redirect()->back()->with('message', 'Username atau Password salah!');
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken("API TOKEN")->plainTextToken;

        if($user->role == 'user'){
            return redirect()->route('welcome');
        }elseif($user->role == 'admin'){
            return redirect()->route('index-game');
        }else{
            return view('welcome');
        }
    }

    public function logout()
    {
        if(auth()->check()){
            Auth::user()->tokens()->delete();

            return redirect()->route('loginform');
        }
    }
}
