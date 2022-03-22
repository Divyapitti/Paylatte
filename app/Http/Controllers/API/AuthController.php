<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;
use Exception;
use Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;

class AuthController extends Controller
{

    public function requestOtp(Request $request)
    {
//        var_dump($request->email);
        $tomail = $request->email;
        $otp = rand(1000, 9999);
        Log::info("otp = " . $otp);
//            $user = User::where('email', $request->email)->update(['otp' => $otp]);
        $affected = DB::table('users')
            ->where('email', $request->email)
            ->update(['otp' => $otp]);

        if ($affected) {
            // send otp in the email
            $mail_details = 'Testing Application OTP';
            $temp = 'Your OTP is : ' . $otp;
            $mail_details = $mail_details.'---'.$temp;

//            Mail::to($request->email)->send($mail_details);

            Mail::raw($mail_details, function($message) use ($tomail)
            {

                $message->to($tomail)
                        ->subject('Verify Your OTP');
            });

            return response(["status" => 200, "message" => "OTP sent successfully"]);
        } else {
            return response(["status" => 401, 'message' => 'Invalid']);
        }
    }

    public function verify_otp(Request $request){

        $email=$request->email;
        $otp=$request->otp;

        $verify=DB::table('users')
            ->where('email',$email )
            ->where('otp',$otp)
            ->update(['email_status' => 1]);



        if($verify)
        {
            return response(["status" => 200, "message" => "OTP verified successfully"]);
        }
        else{
            return response(["status" => 401, "message" => "OTP invalid "]);
        }
    }

}
