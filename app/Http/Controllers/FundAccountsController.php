<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FundAccountsController extends Controller
{
    //
    /**
     * Allows user to fund their account
     * @param registered user id Amount to fund
     * @param response
     * returns json
     */

     public function fundAccount(Request $request, $id){
         $amount = $request->amount;
         // find the previous balance
         $prevBal = User::findOrFail($id);
         $balance = $prevBal->balance + $amount;
        $funded = User::where('id', $id)->update(['balance'=> $balance]);

        if ($funded){
            return response($content = 'User funded successfully', $status = 200);
        }else{
            return response($content = 'An error occur User was not funded ', $status = 400);

        }
     }
}
