<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
Use App\Models\Certificate;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CertificateImport;
Use App\Models\Admin;
Use App\Models\Appointment;
Use App\Models\Doctor;
Use App\Models\User;
use Carbon\Carbon;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $user = DB::select("SELECT * FROM users ORDER BY id DESC");
        $request = DB::select("SELECT * FROM appointments WHERE status = 0");
        $booked = DB::select("SELECT * FROM appointments WHERE status = 1");
        // $request = Appointment::where('status', '0');
        // $booked = Appointment::where('status', '1')->first();
        return view('admin/dashboard', compact('user','request', 'booked',));
    }

    public function schedule(Request $request){

       
        if(isset($_POST['update'])){
            $request->validate([
                'date' => 'required',
                'time' => 'required',
            ]);

            $update = Appointment::find($request->id);
            if($update){
                $ind['doctor'] =$request->get('doctor');
                $ind['date'] =$request->get('date');
                $ind['time'] =$request->get('time');
                $ind['status'] = 1;

                $update->update($ind);

                $to = '+2348098626399';
                    $from = getenv("TWILIO_FROM");
                    $message = 'Hello Mr/Mrs '.$update->firstname.', Your Apointment has been scheduled to, Date: '
                        . date('d/F/Y', strtotime($request->date)).' Time:'.date('H:i', strtotime($request->time));
                    //open connection
            
                    $ch = curl_init();
            
                    //set the url, number of POST vars, POST data
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID").':'.getenv("TWILIO_TOKEN"));
                    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                    curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").'/Messages.json', getenv("TWILIO_SID")));
                    curl_setopt($ch, CURLOPT_POST, 3);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'&Body='.$message);
            
                    // execute post
                    $result = curl_exec($ch);
                    $result = json_decode($result);
            
                    // close connection
                    curl_close($ch);

                return back()->with('success', 'Appointment successfully scheduled');
            }
        }

        if(isset($_POST['delete'])){
            $request->validate([
                'id' => 'required'
            ]);

            $r = Appointment::find($request->id);
            if($r){
               
                $r->delete($r);
                return back()->with('success', 'Record Successfully Deleted');
            }else{
                return back()->with('error','server error');
            }
            
        }


       $d = Doctor::all();
        return view('admin/request', compact('d'));
    }

    public function doctor(Request $request) {

        if(isset($_POST['create'])){
            $request->validate([
                'name' => 'required',
                'department' => 'required',
               
            ]);
            
            $d = Doctor::create([
                'name' => $request->input('name'),
                'department' => $request->input('department'),
            ]);

            if($d){
                return back()->with("success", "Successfully Added");
            }else{

                return back()->with("error", "error");
            }

        }

        if(isset($_POST['update'])){
            $request->validate([
                'name' => 'required',
                'department' => 'required',
            ]);

            $update = Doctor::find($request->id);
            if($update){
                $ind['name'] =$request->get('name');
                $ind['department'] = $request->get('department');

                $update->update($ind);

                return back()->with('success', 'Record Successfully Updated');
            }
        }

        if(isset($_POST['delete'])){
            $request->validate([
                'id' => 'required'
            ]);

            $r = Doctor::find($request->id);
            if($r){
               
                $r->delete($r);
                return back()->with('success', 'Record Successfully Deleted');
            }else{
                return back()->with('error','server error');
            }
            
        }

        return view('admin/doctor');
    }

    public function attendance(Request $request){
        if(isset($_POST['update'])){
            $request->validate([
               'id' => 'required'
            ]);

            $update = Appointment::find($request->id);

            if($update){

                $ind['attendance'] =$request->get('attendance');

                $update->update($ind);

                if($request->get('attendance') == 'Missed'){

                $to = '+2348098626399';
                $from = getenv("TWILIO_FROM");
                $message = 'Hello Mr/Mrs '.$update->firstname.', You missed your Appointment scheduled for Date: '
                    . date('d/F/Y', strtotime($update->date)).', Time:'.date('H:i', strtotime($update->time));
                //open connection
        
                $ch = curl_init();
        
                //set the url, number of POST vars, POST data
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID").':'.getenv("TWILIO_TOKEN"));
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").'/Messages.json', getenv("TWILIO_SID")));
                curl_setopt($ch, CURLOPT_POST, 3);
                curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'&Body='.$message);
        
                // execute post
                $result = curl_exec($ch);
                $result = json_decode($result);
        
                // close connection
                curl_close($ch);                
                }


                return back()->with('success', 'successfully updated');
            }
        }
        return view('admin/attendance');
    }
}
