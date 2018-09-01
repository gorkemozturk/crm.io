<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TeamMember;

class TeamMemberController extends Controller
{
    /**
     * Apply to an existing team as a user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apply($id)
    {
        $data['user_id'] = Auth::user()->id;
        $data['team_id'] = $id;
        $data['is_active'] = false;

        TeamMember::create($data);

        return redirect()->route('team.index')->with('success', 'Ekibe başarılı bir şekilde başvurdunuz.');
    }
}
