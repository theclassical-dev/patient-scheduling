<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{   
    public function __construct()
    {
        // $this->middleware('guest:admin')->except('logout');
    } 

    public function index(Request $request){

        if(isset($_POST['login'])){
            $this->validate($request,
                [
                'email' => 'required',
                'password' =>'required'
                ]
            );
                    // dd([$request->email, $request->password]);

            $user = User::where(['email' => $request->email, 
                'password' => $request->password])->first();


            if($user){
                auth()->login($user); 

                return redirect()->route('user.dashboard');
            }
            else{
                return back()->with("error", "wrong login");
            }
        }

    	return view('auth/login');
    }

    public function register(Request $request)
    {
        if(isset($_POST['register'])) 
        {
                $request->validate([
                'firstname'=>'required|string',
                'lastname'=>'required|string',
                'email'=>'required|email',
                'phone'=>'required|numeric',
                'password'=>'required|string',   
                'password_confirmation'=>'required|string',   
            ]);
        

            $user = User::create([
              
                'firstname'=>$request->input('firstname'),
                'lastname'=>$request->input('lastname'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
                'password'=>$request->input('password'),
            ]);
            if ($user) {
                auth()->login($user); 

                return redirect()->route('user.dashboard');
            }
            return back()->with("error", "Error");
        }
       return view('auth/register');
    }
}