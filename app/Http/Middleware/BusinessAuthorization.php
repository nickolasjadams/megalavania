<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessAuthorization
{
    /**
     * Verifies the logged in user (business) is authorized to view the request.
     * Else they will be given a 403.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * Pattern for checking dashboard requests.
         * Provides grouping for [path, business_slug, action1, action2]
         * See it here: https://regex101.com/r/kr7hnK/2
         */
        $url_pattern = "/([\w\-\_]+)(?:\/([\w\-\_]+))?(?:\/([\w\-\_]+))?/";

        if (preg_match($url_pattern, $request->path(), $path_groups) === 1) {

             $logged_in_business_id = Auth::user()->id;

             if ($logged_in_business_id === User::getIdFromSlug($path_groups[1])) {
                 return $next($request);
             }
        }
        abort(403, 'Unauthorized action.');
    }
}
