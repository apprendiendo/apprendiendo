<?php
/**
 * Created by PhpStorm.
 * User: Peru
 * Date: 16/09/2015
 * Time: 04:29 PM
 */

namespace App;


interface AuthenticateGoogleUserListener {
    public function userHasLoggedIn($user);
    public function userHasLoggedOut();
}