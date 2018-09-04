<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\TeamMember;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TeamStoreRequest as StoreRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // The query which related with members.
        $isMember = TeamMember::where('user_id', Auth::user()->id)->where('is_active', true)->first();

        // Queries which related with non-members and passive members.
        $passiveMember = TeamMember::where('user_id', Auth::user()->id)->where('is_active', false)->first();
        $teams = Team::all();

        if(isset($isMember)) {
          $members = TeamMember::where('team_id', $isMember->team_id)->where('is_active', true)->first();

          return view('team.dashboard')->withIsMember($isMember)->withMembers($members);
        }else {
          return view('team.index')->withPassiveMember($passiveMember)->withTeams($teams);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();

        $team = Team::create($data);

        $data['user_id'] = Auth::user()->id;
        $data['team_id'] = $team->id;
        $data['is_active'] = true;

        TeamMember::create($data);

        return redirect()->route('teams.index')->with('success', 'Ekip başarılı bir şekilde kuruldu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
