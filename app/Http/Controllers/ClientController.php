<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    function create()
    {
        return view('clients.create');
    }
}
