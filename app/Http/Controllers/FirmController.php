<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FirmStoreRequest as StoreRequest;
use App\Http\Requests\FirmUpdateRequest as UpdateRequest;
use App\Firm as Model;
use App\TeamMember;
use App\Sector;
use Illuminate\Support\Facades\Auth;

class FirmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('nonmember');
        $this->middleware('nonowner')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firms = Model::get();

        return view('firm.index', compact('firms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = TeamMember::where('user_id', Auth::user()->id)->where('is_active', true)->first();
        $sectors = Sector::where('team_id', $member->team_id)->get();

        return view('firm.create', compact('sectors'));
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
        $data['user_id'] = $member->user_id;
        $data['team_id'] = $member->team_id;

        Model::create($data);

        return redirect()->route('firms.index')->with('success', trans('Firma başarılı bir şekilde eklendi.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $firm = Model::findOrFail($id);

        return view('firm.show', compact('firm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = TeamMember::where('user_id', Auth::user()->id)->where('is_active', true)->first();
        $sectors = Sector::where('team_id', $member->team_id)->get();
        $firm = Model::findOrFail($id);

        return view('firm.edit', compact('firm', 'sectors'));
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

        return redirect()->back()->with('success', trans('Firma başarılı bir şekilde güncellendi.'));
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

        return redirect()->back()->with('success', trans('Firmayı başarılı bir şekilde sildiniz.'));
    }
}
