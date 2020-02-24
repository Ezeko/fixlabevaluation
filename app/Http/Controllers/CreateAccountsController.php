<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CreateAccountsController extends Controller
{
    //
    /**
     * Allows user to create an account
     * @param Request
     * returns status 201 and success message in json
     */

     public function createAccount(Request $request){
        // hash password

        $pass = password_hash($request->password, PASSWORD_DEFAULT);
        //initialize variables

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->balance = $request->balance;
        $user->password = $pass;

        $saved = $user->save();

        if ($saved){
            return response($content = 'Account Created Sucessfully', $status = 201,  $headers = []);
        }else{
            return response($content = 'Unable to create  account', $status = 400,  $headers = []);
        }
     }
}
