<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transection;

class TransectionController extends Controller
{
    // get all transection
    public function index(){        
        $title = 'Users all transections';
        $transection = Transection::all();
        $data= compact('title','transection');
        return view('transection.index')->with($data);
    }
    // User register
    public function deposit(){      
        $title = 'Users Deposit Form';
        $data= compact('title');
        return view('deposit.create')->with($data);
    }

    // user store
    public function store(Request $request){
        $data = $request->all();
        $request->validate(
            [
                'amount'=>'required|integer',
            ]
        );

        $deposite = new Transection;
        $deposite->amount = $data['amount'];
        $deposite->user_id = auth()->user()->id;
        $deposite->transection_type = 'deposit';
        $deposite->fee = 0;
        $deposite->date = date('Y-m-d');
        $deposite->save();

        return redirect()->route('getLogin');

    }

     // user deshborard
     public function dashboard(){
        $data=[
            'title'=>'Dashboard'
        ];
        return view('dashboard',$data);
    }

   
}
