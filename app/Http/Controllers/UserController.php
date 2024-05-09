<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // get all transection
    public function index(){        
        $title = 'Users informations';
        $user = User::get()->where('id',auth()->user()->id);
        $data= compact('title','user');
        return view('users.index')->with($data);
    }
    // User register
    public function register(){      
        $title = 'Users Register';
        $data= compact('title');
        return view('users.register')->with($data);
    }

    // user store
    public function store(Request $request){
        $data = $request->all();
        
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required',
                'account_type'=>'required',
                'balance'=>'required'
            ]
        );

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->account_type = $data['account_type'];
        $user->balance = $data['balance'];
        $user->password = \Hash::make($data['password']);
        $user->save();

        return redirect()->route('getLogin');

    }

     // user deshborard
     public function dashboard(){
        $data=[
            'title'=>'Dashboard'
        ];
        return view('dashboard',$data);
    }

     // user logout
     public function logout(){
        auth()->logout();
        return redirect()->route('getLogin')->with('success','You have been successfully logged out');
    }

   
}
