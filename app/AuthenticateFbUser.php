<?php

namespace App;

use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\FbData\UserFbData;

class AuthenticateFbUser {
    private $socialite;
    private $auth;
    private $users;

    public function __construct(UserFbData $users, Socialite $socialite, Guard $auth){
        $this->users = $users;
        $this->socialite = $socialite;
        $this->auth = $auth;
    }
    public function execute($hasCode,$listener){
        if(!$hasCode)
            return $this->getAuthorizationFirst();
        //$user = $this->socialite->driver('facebook')->user();
        $user = $this->users->findByUsernameOrCreate($this->getFacebookUser());
        //  dd($user);
        $this->auth->login($user, true);
        return $listener->userHasLoggedIn($user);
    }

    public function destroy(AuthenticateFbUserListener $listener){
        $this->auth->logout();
        return $listener->userHasLoggedOut();
    }

    /* Método auxiliar para autorizar el login, si no se tiene el código de autorización */
    private function getAuthorizationFirst(){
        return $this->socialite->driver('facebook')->redirect();
    }


    private function getFacebookUser(){
        return $this->socialite->driver('facebook')->user();
    }
}