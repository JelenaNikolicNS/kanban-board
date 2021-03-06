<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Show all card (task) states (columns).
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        //$states = \App\State::all();
        $states = \App\State::orderBy('id','ASC')->get();;
        if(!$states) {
            $states = '';
        }
        return view('welcome',compact('states'));
    }

    /**
     * Show add state (column) form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add() {
        return view('states/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required||max:50',
            ]);

        $state = new \App\State;
        $state->name = $request->get('name');

        if($request->get('limit')){
            $state->limit = $request->get('limit');
        } else {
            $state->limit = '0';
        }
        $state->save();

        return redirect('/')->with('success', 'State ' . $state->name . ' has been added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = \App\State::find($id);
        return view('states/edit',compact('state','id'));
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
        $request->validate([
            'name' => 'required||max:50',
        ]);

        $state = \App\State::find($id);
        $state->name = $request->get('name');
        if($request->get('limit')){
            $state->limit = $request->get('limit');
        } else {
            $state->limit = '0';
        }
        $state->save();
        return redirect('/')->with('success', 'State ' . $state->name . ' has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $state = \App\State::find($id);
        $state->delete();
        return redirect('/')->with('success', 'State ' . $state->name . ' has been deleted.');;
    }

}
