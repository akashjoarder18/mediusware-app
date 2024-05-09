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
        $transection = Transection::get()->where('user_id',auth()->user()->id);
        $data= compact('title','transection');
        return view('transection.index')->with($data);
    }

    // get all transection
    public function getDeposit(){        
        $title = 'Users Deposit transections';
        $transection = Transection::get()->where('transection_type','deposit')->where('user_id',auth()->user()->id);
        $data= compact('title','transection');
        return view('deposit.index')->with($data);
    }

    // User Deposit Transection
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

        $userAccount  =  auth()->user();
        $userAccount->balance = $userAccount->balance + $data['amount'];
        $userAccount->save();

        $deposite = new Transection;
        $deposite->amount = $data['amount'];
        $deposite->user_id = auth()->user()->id;
        $deposite->transection_type = 'deposit';
        $deposite->fee = 0;
        $deposite->date = date('Y-m-d');
        $deposite->save();

        return redirect()->route('get.deposit.show');

    }


    // get all transection
    public function getWithdrawal(){        
        $title = 'Users Withdrawal Transections';
        $transection = Transection::get()->where('transection_type','withdrawal')->where('user_id',auth()->user()->id);
        $data= compact('title','transection');
        return view('withdrawal.index')->with($data);
    }

    // User Withdrawal Transection
    public function withdrawal(){      
        $title = 'Users Withdrawal Form';
        $data= compact('title');
        return view('withdrawal.create')->with($data);
    }

    // user store
    public function storeWithdrawal(Request $request){
        $data = $request->all();
        $rate = 0;
        $request->validate(
            [
                'amount'=>'required|integer',
            ]
        );

        if(auth()->user()->account_type == 'Individual'){
            $rate = (0.015 / 100)*$data['amount'];
            if(date("l") == "Friday"){
                $rate = 0;
            }
        }elseif(auth()->user()->account_type == 'Business'){
            $rate = (0.025 / 100)*$data['amount'];
        }

        $withdrawalAmount = $data['amount']+$rate;
        $userAccount  =  auth()->user();
        $userAccount->balance = $userAccount->balance - $withdrawalAmount;
        $userAccount->save();

        $deposite = new Transection;
        $deposite->amount = $data['amount'];
        $deposite->user_id = auth()->user()->id;
        $deposite->transection_type = 'withdrawal';
        $deposite->fee = $rate;
        $deposite->date = date('Y-m-d');
        $deposite->save();

        return redirect()->route('get.withdrawal.show');

    }

   
}
