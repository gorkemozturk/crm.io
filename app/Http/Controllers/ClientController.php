<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientStoreRequest as StoreRequest;
use App\Http\Requests\ClientUpdateRequest as UpdateRequest;
use App\Client as Model;
use App\TeamMember;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('nonmember')->only('index');
        $this->middleware('nonowner')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = TeamMember::where('user_id', Auth::user()->id)->where('is_active', true)->first();
        $clients = Model::where('team_id', '=', $member->team_id)->get();

        return view('directory.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('directory.create');
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
        $data['firm_id'] = $id;

        Model::create($data);

        return redirect()->route('directory.index')->with('success', trans('Kişi başarılı bir şekilde eklendi.'));
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
        $client = Model::find($id);

        return view('directory.edit', compact('client'));
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

        return redirect()->back()->with('success', trans('Kişiyi başarılı bir şekilde güncellediniz.'));
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

        return redirect()->back()->with('success', trans('Kişiyi başarılı bir şekilde sildiniz.'));
    }
}
