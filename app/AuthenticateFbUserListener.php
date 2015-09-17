<?php


namespace App;

interface AuthenticateFbUserListener{
    public function userHasLoggedIn($user);
    public function userHasLoggedOut();
}