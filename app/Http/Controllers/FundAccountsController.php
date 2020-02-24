<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FundAccountsController extends Controller
{
    //
    /**
     * Allows user to fund their account
     * @param registered user id Amount to fund send amount and id with request
     * @param response
     * returns json
     */

     public function fundAccount(Request $request){
         $amount = $request->amount;
         // find the previous balance
         $prevBal = User::findOrFail($request->id);
         $balance = $prevBal->balance + $amount;
        $funded = User::where('id', $request->id)->update(['balance'=> $balance]);

        if ($funded){
            return response($content = ['message' =>'User funded successfully' ], $status = 200);
        }else{
            return response($content = ['message'=>'An error occur User was not funded '], $status = 400);

        }
     }
}
