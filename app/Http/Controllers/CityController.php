<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CitiesImport; // Create this import class

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::withCount('states')->get();
        return view('cities.index', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);
        // Create the city
        City::create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::findOrFail($id);
        return view('cities.edit', ['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
        ]);
        $city = City::find($id);
        $city->update([
            'name' => $request->name,
        ]);

        return redirect()->route('cities.index')->with('success', 'City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($city)
    {
        $singlecityFromDB = City::find($city);
        $singlecityFromDB -> delete();
        return to_route('cities.index')->with('success', 'service deleted successfully.');
    }
    public function importForm()
    {
        return view('cities.import');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required','mimes:xlsx,csv','max:2048',
        ]);

        $file = $request->file('file');

        try {
            Excel::import(new CitiesImport, $file);

            return redirect()->route('cities.index')->with('success', 'Cities imported successfully.');
        } catch (\Exception $e) {
            return redirect()->route('cities.import.form')->with('error', 'Error importing cities. ' . $e->getMessage());
        }
    }
}
