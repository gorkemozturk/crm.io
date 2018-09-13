<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TeamMember;

class TeamMemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('memberless')->only('dashboard');
    }

    /**
     * Display applications.
     *
     * @return \Illuminate\Http\Response
     */
    public function applications()
    {
        $isMember = TeamMember::where('user_id', Auth::user()->id)->where('is_active', true)->first();
        $applicants = TeamMember::where('team_id', $isMember->team_id)->where('is_active', false)->get();

        return view('team.applicants')->withApplicants($applicants);
    }

    /**
     * Display the team members.
     *
     * @return \Illuminate\Http\Response
     */
    public function members()
    {
        $isMember = TeamMember::where('user_id', Auth::user()->id)->where('is_active', true)->first();
        $members = TeamMember::where('team_id', $isMember->team_id)->where('is_active', true)->get();

        return view('team.members')->withMembers($members);
    }

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

        return redirect()->route('teams.index')->with('success', trans('Ekibe başarılı bir şekilde başvurdunuz.'));
    }

    /**
     * Confirm an existing passive user to the team.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $data['is_active'] = true;

        TeamMember::find($id)->update($data);

        return redirect()->route('member.application')->with('success', trans('Başvuruyu başarılı bir şekilde kabul ettiniz.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TeamMember::find($id)->delete();

        return redirect()->back()->with('success', trans('Takımdan başarılı bir şekilde çıkardınız.'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // The query which related with members.
        $isMember = TeamMember::where('user_id', Auth::user()->id)->where('is_active', true)->first();

        // The query which related with member mates.
        $members = TeamMember::where('team_id', $isMember->team_id)->where('is_active', true)->get();

        return view('team.dashboard')->withIsMember($isMember)->withMembers($members);
    }
}
