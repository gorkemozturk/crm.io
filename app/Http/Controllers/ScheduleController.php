<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreScheduleRequest as StoreRequest;
use App\Schedule as Model;
use App\TeamMember;
use App\ScheduleType;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = TeamMember::where('user_id', Auth::user()->id)->where('is_active', true)->first();
        $schedules = Model::where('team_id', $member->team_id)->get();

        return view('schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = TeamMember::where('user_id', Auth::user()->id)->where('is_active', true)->first();
        $scheduleTypes = ScheduleType::where('team_id', $member->team_id)->get();

        return view('schedule.create', compact('scheduleTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, $id)
    {
        $member = TeamMember::where('user_id', Auth::user()->id)->where('is_active', true)->first();

        $data = $request->all();
        $data['user_id'] = $member->user_id;
        $data['team_id'] = $member->team_id;
        $data['client_id'] = $id;

        Model::create($data);

        return redirect()->route('schedule.index')->with('success', trans('Plan başarılı bir şekilde eklendi.'));
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
