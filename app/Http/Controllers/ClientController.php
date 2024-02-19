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
    function store(){
        
        request()->validate([
            'denomenation'=>['required','min:3'],
            'ice'=>['required','min:10'],
            'address'=>['required'],
            'tel'=>['required'],
            'email'=>['required','Email'],
            'city'=>['required'],
            'state'=>['required'],
            'zipcode'=>['required'],
            'tp'=>['required'],
            'cnss'=>['required'],
            'idf'=>['required'],
            'fullName'=>['required'],
            'telRes'=>['required'],
            'emailRes'=>['required'],
        ]);

        Client::create([
            'denomenation' => request()->denomenation,
            'ice' => request()->ice,
            'address' => request()->address,
            'tel' => request()->tel,
            'email' => request()->email,
            'city'=>request()->city,
            'state'=>request()->state,
            'zipcode'=>request()->zipcode,
            'tp'=>request()->tp,
            'cnss'=>request()->cnss,
            'idf'=>request()->idf,
            'fullName'=> request()->fullName,
            'telRes'=>request()->telRes,
            'emailRes'=>request()->emailRes,
        ]);
        return to_route('clients.index');
    }
    function index(){
        $clients = Client::all();
        return view('clients.index',['clients'=>$clients]);
    }
    function edit($client)  {
        $singleClientFromDB = Client::findOrfail($client);
        return view('clients.edit',['client'=>$singleClientFromDB]);
    }
    function update($clientId)
    {
        //we validate the input 
        request()->validate([
            'denomenation'=>['required','min:3'],
            'ice'=>['required','min:10'],
            'address'=>['required'],
            'tel'=>['required'],
            'email'=>['required','Email'],
            'city'=>['required'],
            'state'=>['required'],
            'zipcode'=>['required'],
            'tp'=>['required'],
            'cnss'=>['required'],
            'idf'=>['required'],
            'fullName'=>['required'],
            'telRes'=>['required'],
            'emailRes'=>['required'],
        ]);
        
        $singleClientFromDB = Client::find($clientId);
        $singleClientFromDB->update([
            'denomenation' => request()->denomenation,
            'ice' => request()->ice,
            'address' => request()->address,
            'tel' => request()->tel,
            'email' => request()->email,
            'city'=>request()->city,
            'state'=>request()->state,
            'zipcode'=>request()->zipcode,
            'tp'=>request()->tp,
            'cnss'=>request()->cnss,
            'idf'=>request()->idf,
            'fullName'=> request()->fullName,
            'telRes'=>request()->telRes,
            'emailRes'=>request()->emailRes,
        ]);
        //dd($singlePostFromDB->id);
        return to_route('clients.index', $clientId);
        
    }
}
