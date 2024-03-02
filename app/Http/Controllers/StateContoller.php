<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StateImport; // Create this import class


class StateContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::all();
        return view('state.index', ['state' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('state.create', ['city' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //we validate the input 
        $request->validate([
            'name' => ['required', 'min:3'],
            'zipcode' => ['required'],
            'city' => ['required', 'exists:cities,id'],
        ]);

        State::create([
            'state' => $request->name,
            'zipcode' => $request->zipcode,
            'city_id' => $request->city,
        ]);
        return to_route('cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $state = State::findOrFail($id);
        $cities = City::all();
        return view('state.edit', ['state' => $state, 'city' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'zipcode' => ['required'],
            'city' => ['required', 'exists:cities,id'],
        ]);
        $state = State::find($id);
        $state->update([
            'state' => $request->name,
            'zipcode' => $request->zipcode,
            'city_id' => $request->city,
        ]);
        return to_route('states.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $singlestateFromDB = State::find($id);
        $singlestateFromDB->delete();
        return redirect()->route('states.index')->with('success', 'service deleted successfully.');
    }
    public function importForm()
    {
        $cities = City::all();
        return view('state.import',['city' => $cities]);
    }
    public function import(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'file' => 'required', 'mimes:xlsx,csv', 'max:2048',
        ]);

        $cityId = $request->input('city');
        $file = $request->file('file');

        try {
            Excel::import(new StateImport($cityId), $file);
            return redirect()->route('states.index')->with('success', 'Cities imported successfully.');
        } catch (\Exception $e) {
            return redirect()->route('states.import.form')->with('error', 'Error importing cities. ' . $e->getMessage());
        }
    }
}
