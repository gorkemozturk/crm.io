<?php

namespace App\Http\Middleware;

use Closure;
use App\TeamMember as Model;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotATeamOwner
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
        $member = Model::where('user_id', Auth::user()->id)->where('is_active', true)->first();
        $owner = Model::where('team_id', $member->team_id)->first();

        if ($owner->id != $member->id) {
            return redirect()->back()->with('error', trans('Gerekli izniniz bulunmamaktadır.'));
        }

        return $next($request);
    }
}
