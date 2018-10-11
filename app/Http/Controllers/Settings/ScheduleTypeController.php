<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ScheduleType as Model;
use App\TeamMember;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreScheduleTypeRequest as StoreRequest;
use App\Http\Requests\UpdateScheduleTypeRequest as UpdateRequest;

class ScheduleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Model::all();

        return view('settings.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $member = TeamMember::where('user_id', Auth::user()->id)->where('is_active', true)->first();

        $data = $request->all();
        $data['team_id'] = $member->team_id;

        Model::create($data);

        return redirect()->route('schedule-type.index')->with('success', trans('Plan başarılı bir şekilde eklendi.'));
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
        $schedule = Model::findOrFail($id);

        return view('settings.schedule.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        Model::findOrFail($id)->update($request->all());

        return redirect()->back()->with('success', trans('Plan başarılı bir şekilde güncellendi.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Model::findOrFail($id)->delete();

        return redirect()->route('schedule-type.index')->with('success', trans('Plan başarılı bir şekilde silindi.'));
    }
}
