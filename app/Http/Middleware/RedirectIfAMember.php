<?php

namespace App\Http\Middleware;

use Closure;
use App\TeamMember as Model;
use Illuminate\Support\Facades\Auth;

class RedirectIfAMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $isMember = Model::where('user_id', Auth::user()->id)->where('is_active', true)->first();

        if (isset($isMember)) {
            return redirect()->route('member.dashboard')->with('error', trans('Zaten bir gruba üyesiniz.'));
        }

        return $next($request);
    }
}
