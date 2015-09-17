<?php namespace App\FbData;

use App\User;

class UserFbData {
    public function findByUsernameOrCreate($userInfo)
    {
        return User::firstOrCreate([
            'username' => $userInfo->name,
            'email' => $userInfo->email,
            'avatar' => $userInfo->avatar
        ]);
    }
}