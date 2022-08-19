<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::guard("user")->user();
        
        if(isset($_POST['book'])){
            $this->validate($request,[
                'firstname'=> 'required',
                'lastname'=> 'required',
                'email'=>   'required',
                'phone'=>'required',
                'address'=> 'required',
                'disease'=> 'required',
            ]);

            $book = Appointment::create([
                'user_id'=>auth()->user()->id,
                'firstname' => $request->input('firstname'),
                'lastname'=> $request->input('lastname'),
                'email'=> $request->input('email'),
                'phone' => $request->input('phone'),
                'address'=> $request->input('address'),
                'disease'=> $request->input('disease'),
                'description'=> $request->input('description'),
            ]);

            if($book){

                return back()->with('success','You have successfully booked an appointment date & time will be communicated through the provided contact');
            }else{
                return back()->with('error','There was an error booking your appointment. Please try again later.');
            }
        }

        $block = auth()->user()->appointment()->first();
        return view('user/dashboard', compact('block'));
    }

    
    public function notify(Request $request){

        $user = Auth::guard("user")->user();

        
        // $check = auth()->user()->certificate()->find($id);
        return view('user/notification');
    }

}
