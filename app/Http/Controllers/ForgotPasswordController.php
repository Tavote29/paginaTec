<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
   

    public function ForgetPassword(){
        return view('auth.forgetPassword');
    }

    public function ForgetPasswordStore(Request $request){
        $request->validate([
            'email'=> 'required|email|exists:users',
        ]);
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.forget_password_email',['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->from(env('MAIL_FROM_ADDRESS', env('APP_NAME')));
            $message->subject('Reset Password');
        });
        return back()->with('message', 'We have emailed your password reset link!');
    }

    public function ResetPassword($token){
        return view('auth.reset_password',['token'=> $token]);
    }

    public function ResetPasswordStore(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required'
        ]);

        $update = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if(!$update){
            return back()->withInput()->with('error','Invalid token!');
        }

        $user = User::where('email',$request->email)->update(['password'=> Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' =>$request->email])->delete();

        return redirect('/')->with('message','Your password has been succesful');
    }
}
