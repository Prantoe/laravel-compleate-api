<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_balance;
use App\Models\Topup;
use Illuminate\Support\Facades\Hash;

class TopupController extends Controller
{
    public function doTopup(Request $request)
    {
        
        $user = $request->user()->id;
        $request->validate(
            [
                'balance' => 'required',
                'balance_archieve' => 'required'
            ]
            );
            $balance = new user_balance;
            $balance->user_id = $user;
            $balance->balance = $request->balance;
            $balance->balance_archieve = $request->balance_archieve;
            $balance->save();
            
        return response()->json([
            'message' => 'Top up saldo success!',
            'data' => $balance
        ],200);

    }
}
