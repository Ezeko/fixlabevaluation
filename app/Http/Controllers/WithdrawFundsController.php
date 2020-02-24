<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class WithdrawFundsController extends Controller
{
    //
    /**
     * Allow users withdraw their funds
     * @param Request , id
     * @param response
     * return message to user
     */

     public function withdrawFund(Request $request){
        $amount = $request->amount;
        // find the previous balance
        $prevBal = User::findOrFail($request->id);
        $balance = $prevBal->balance - $amount;
        if($balance >= 0){
       $withdrawn = User::where('id', $request->id)->update(['balance'=> $balance]);

       if ($withdrawn){
           return response($content = ['message'=>'Fund withdrawn successfully'], $status = 200);
       }else{
           return response($content = ['message'=>'An error occur User cannot withdraw at the moment '], $status = 400);

       }
     }else{
        
        return response($content = ['message'=>'Insufficient balance '], $status = 404);
    }
    }
}
