<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    // getLogin method
    public function getLogin(){
        return view('auth.login');
    }

    // postLogin to admin user authenticate
    public function postLogin(Request $request){   
          
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $validated=auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ],$request->password);

        if($validated){
            if(Auth::check()){                
                return redirect()->route('dashboard')->with('success','Login Successfull');
            }else{
                return redirect()->back()->with('error','Invalid credentials');
            }
        }else{
            return redirect()->back()->with('error','Invalid credentials, please create an account!');
        }
    }
}
