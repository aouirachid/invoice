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
    public function show($serviceId)
    {
        $singleserviceFromDB = Service::findOrfail($serviceId);
        return view('services.show', ['service' => $singleserviceFromDB]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($service)
    {
        $singleServiceFromDB = Service::findOrfail($service);
        return view('services.edit', ['service' => $singleServiceFromDB]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$serviceId)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'price' => ['required'],
            'tva' => ['required'],
        ]);
        $service = Service::find($serviceId);
        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'tva' => $request->tva,
        ]);
    
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
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
