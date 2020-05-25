<?php

use App\User;

if (!function_exists('getProfileImageLink')) {

    function getProfileImageLink(User $user): string
    {
        $email = $user->email;
        $encryptEmail = md5($email);
        $link = "https://www.gravatar.com/avatar/{$encryptEmail}?s=500";
        return $link;
    }
}
