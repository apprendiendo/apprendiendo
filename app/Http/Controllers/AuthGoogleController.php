<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\AuthenticateGoogleUser;
use App\AuthenticateGoogleUserListener;

class AuthGoogleController extends Controller implements AuthenticateGoogleUserListener
{

    public function login(AuthenticateGoogleUser $authenticategoogleuser,Request $request)
    {
        return $authenticategoogleuser->execute($request->has('code'),$this);
    }
    public function logout(AuthenticateTwitterUser $authenticateUser){
        return $authenticateUser->destroy($this);
    }
    public function userHasLoggedIn($user)
    {
        return redirect('/');
    }

    public function userHasLoggedOut()
    {
        return redirect('/');
    }
}
