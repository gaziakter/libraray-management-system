<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Login dashboard
    public function auth_login(Request $request){
        //dd(Hash::make(12345));
        if(!empty(Auth::check())){
            return redirect('panel/dashboard');
        }
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ],  $remember)){
            return redirect('panel/dashboard');

        } else{
            return redirect()->back()->with('error', 'Please enter current username and possword');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }
}