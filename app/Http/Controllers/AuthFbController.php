<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\AuthenticateFbUser;
use App\AuthenticateFbUserListener;

class AuthFbController extends Controller implements AuthenticateFbUserListener
{

    public function login(AuthenticateFbUser $authenticatefbuser,Request $request)
    {
        return $authenticatefbuser->execute($request->has('code'),$this);
    }
    public function userHasLoggedIn($user)
    {
        return redirect('/');
    }

    public function userHasLoggedOut()
    {
        return redirect('/');
    }

    public function logout(AuthenticateFbUser $authenticateUser){
        return $authenticateUser->destroy($this);
    }
}
