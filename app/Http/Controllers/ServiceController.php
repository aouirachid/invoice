<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::all();
        return view('services.index', ['services' => $service]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:services', 'min:3'],
            'price' => ['required'],
            'tva' => ['required'],
        ]);
        // Check if the 'name' already exists
        if (Service::where('name', $request->name)->exists()) {
            // Return an error response if 'name' already exists
            return redirect()->back()->withInput()->withErrors(['name' => 'The name already exists.']);
        }
        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'tva' => $request->tva,
        ]);
        return to_route('services.index')->with('success', 'service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($service)
    {
        $singleservicesFromDB = Service::find($service);
        $singleservicesFromDB -> delete();
        return to_route('services.index')->with('success', 'service deleted successfully.');
    }
}
