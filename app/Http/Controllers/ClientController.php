<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function create()
    {
        return view('clients.create');
    }
    function store()
    {
        request()->validate([
            'denomenation' => ['required','unique:clients', 'min:3'],
            'ice' => ['required', 'min:10'],
            'address' => ['required'],
            'tel' => ['required'],
            'email' => ['required', 'Email'],
            'city' => ['required'],
            'state' => ['required'],
            'zipcode' => ['required'],
            'tp' => ['required'],
            'cnss' => ['required'],
            'idf' => ['required'],
            'logo' => ['image','mimes:jpeg,png,jpg,gif','max:2048'],
            'fullName' => ['required'],
            'telRes' => ['required'],
            'emailRes' => ['required'],
        ]);
        // Check if the 'denomenation' already exists
        if (Client::where('denomenation', request()->denomenation)->exists()) {
            // Return an error response if 'denomenation' already exists
            return redirect()->back()->withInput()->withErrors(['denomenation' => 'The denomenation already exists.']);
        }
        // Handle image upload
        $logoPath = null;
        try {
            $logoPath = request()->file('logo')->store('company_logo', 'public');
        } catch (\Exception $e) {
            // Handle the error, log it, or provide feedback to the user
            return redirect()->back()->withInput()->withErrors(['logo' => 'Error uploading the logo.']);
        }
        // If validation passes and 'denomenation' is unique, create the new record
        Client::create([
            'denomenation' => request()->denomenation,
            'ice' => request()->ice,
            'address' => request()->address,
            'tel' => request()->tel,
            'email' => request()->email,
            'city' => request()->city,
            'state' => request()->state,
            'zipcode' => request()->zipcode,
            'tp' => request()->tp,
            'cnss' => request()->cnss,
            'idf' => request()->idf,
            'image_path' => $logoPath,
            'fullName' => request()->fullName,
            'telRes' => request()->telRes,
            'emailRes' => request()->emailRes,
        ]);
        return to_route('clients.index')->with('success', 'Client created successfully.');
    }
    function index()
    {
        $clients = Client::all();
        return view('clients.index', ['clients' => $clients]);
    }
    function edit($client)
    {
        $singleClientFromDB = Client::findOrfail($client);
        return view('clients.edit', ['client' => $singleClientFromDB]);
    }
    function update($clientId)
    {
        //we validate the input 
        request()->validate([
            'denomenation' => ['required', 'min:3'],
            'ice' => ['required', 'min:10'],
            'address' => ['required'],
            'tel' => ['required'],
            'email' => ['required', 'Email'],
            'city' => ['required'],
            'state' => ['required'],
            'zipcode' => ['required'],
            'tp' => ['required'],
            'cnss' => ['required'],
            'idf' => ['required'],
            'logo' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'fullName' => ['required'],
            'telRes' => ['required'],
            'emailRes' => ['required'],
        ]);
        // Handle image upload
        $logoPath = null;
        try {
            $logoPath = request()->file('logo')->store('company_logo', 'public');
        } catch (\Exception $e) {
            // Handle the error, log it, or provide feedback to the user
            return redirect()->back()->withInput()->withErrors(['logo' => 'Error uploading the logo.' ]);
        }
        $singleClientFromDB = Client::find($clientId);
        $singleClientFromDB->update([
            'denomenation' => request()->denomenation,
            'ice' => request()->ice,
            'address' => request()->address,
            'tel' => request()->tel,
            'email' => request()->email,
            'city' => request()->city,
            'state' => request()->state,
            'zipcode' => request()->zipcode,
            'tp' => request()->tp,
            'cnss' => request()->cnss,
            'idf' => request()->idf,
            'image_path' => $logoPath,
            'fullName' => request()->fullName,
            'telRes' => request()->telRes,
            'emailRes' => request()->emailRes,
        ]);
        //dd($singlePostFromDB->id);
        return to_route('clients.index', $clientId);
    }
    public function show($clientId)
    {
        $singleclientFromDB = Client::findOrfail($clientId);
        return view('clients.show', ['client' => $singleclientFromDB]);
    }
}
