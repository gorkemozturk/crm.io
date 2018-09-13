<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sector as Model;
use App\TeamMember;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SectorStoreRequest as StoreRequest;
use App\Http\Requests\SectorUpdateRequest as UpdateRequest;

class SectorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = Model::get();

        return view('settings.sector.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.sector.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $member = TeamMember::where('user_id', Auth::user()->id)->first();

        $data = $request->all();
        $data['team_id'] = $member->team_id;

        Model::create($data);

        return redirect()->route('sector.index')->with('success', trans('Sektör başarılı bir şekilde eklendi.'));
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
        $sector = Model::findOrFail($id);

        return view('settings.sector.edit', compact('sector'));
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

        return redirect()->route('sector.index')->with('success', trans('Sektör başarılı bir şekilde güncellendi.'));
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

        return redirect()->route('sector.index')->with('success', trans('Sektör başarılı bir şekilde silindi.'));
    }
}
