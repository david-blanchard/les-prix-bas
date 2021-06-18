<?php

namespace App\Library\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserHelper
{
    public static function isAdmin(): bool
    {
        $result = false;
        $user = Auth::user();
        
        $result = $user !== null ? $user->role === User::ADMIN_ROLE : false;

        return $result;
    }
}
