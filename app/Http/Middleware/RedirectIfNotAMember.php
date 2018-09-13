<?php

namespace App\Http\Middleware;

use Closure;
use App\TeamMember as Model;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAMember
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

        if (!isset($isMember)) {
            return redirect()->route('teams.index')->with('error', trans('Bu alanı görüntüleyebilmek için bir ekibe üye olmak zorundasınız.'));
        }

        return $next($request);
    }
}
