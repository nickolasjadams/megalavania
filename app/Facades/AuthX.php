<?php

namespace App\Facades;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Additional common tasks surrounding
 * the currently logged in user.
 */
class AuthX extends Auth 
{

    /**
     * Get the business name as a slug from the
     * current logged in user.
     * 
     * @return string business_name_slug
     */
    public static function slug()
    {
        $user_id = Auth::user()->id;
        return User::getSlugFromId($user_id);
    }

}