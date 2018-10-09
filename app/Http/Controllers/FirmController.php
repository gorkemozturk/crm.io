<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FirmStoreRequest as StoreRequest;
use App\Firm as Model;
use App\TeamMember;
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
        return view('firm.create');
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
