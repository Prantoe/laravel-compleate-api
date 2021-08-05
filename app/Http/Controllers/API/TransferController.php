<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferController extends Controller
{
   public function sendSaldo(Request $request){
        $userA = User::where('id', $request->input('pengirim_id'))->first();
        $userB = User::where('id', $request->input('penerima_id'))->first();
        $requestSaldo = $request->input('saldo');
        
        if((int)$requestSaldo < 11000){
            return response()->json([
                'success' => false,
                'message' => 'Saldo yang dikirim harus lebih dari 11000'
            ]);
        }

        if($userA->saldo < (int)$requestSaldo){
            return response()->json([
                'success' => false,
                'message' => 'Saldo Anda Tidak Mencukupi'
            ]);
        }

        // update column saldo di table user B
        $jumlahSaldoUserB = $userB->saldo + $request->input('saldo');
        User::where('id', $request->input('penerima_id'))
        ->update(['saldo' => $jumlahSaldoUserB]);
        
        // update sisa saldo di table user A
        $sisaSaldoUserA = $userA->saldo - $request->input('saldo');
        User::where('id', $request->input('pengirim_id'))
                ->update(['saldo' => $sisaSaldoUserA]);
        
        return response()->json([
            'success' => true,
            'message' => [
                'sisa_saldo' => $sisaSaldoUserA,
                'saldo_terkirim' => $request->input('saldo'),
                'jumlah_saldo user B' => $jumlahSaldoUserB
            ]
        ]);
    }

}
