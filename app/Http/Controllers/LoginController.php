<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
       /*  if(Auth::check()){
            return redirect()->route('/');
        } */
        return view('/');
    }

    public function login(LoginRequest $request){
        $credentials=$request->getCredentials();

        if(!Auth::validate($credentials)){
            return redirect()->to('/login')->withErrors('auth.failed');

        }
        $user=Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return $this->authenticated($request,$user);
    }

    public function authenticated(Request $request,$user){
        return redirect('/informacion');//->route('informacion.index');
    }


}
