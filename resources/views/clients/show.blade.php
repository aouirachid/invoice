@extends('layouts.app')

@section('title')
    Show Client
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Company Information
        </div>

        <div class="card-body">
            <h5 class="card-title">Denomination : {{ $client->denomenation}} </h5>
            <p class="card-text">ICE : {{ $client->ice}}</p>
            <p class="card-text">Address : {{ $client->address}}</p>
            <p class="card-text">City : {{ $client->city}}</p>
            <p class="card-text">Tel : {{ $client->tel}}</p>
            <p class="card-text">E-mail : {{ $client->email}}</p>
            <p class="card-text">TP : {{ $client->tp}}</p>
            <p class="card-text">CNSS : {{ $client->cnss}}</p>
            <p class="card-text">IF : {{ $client->idf}}</p>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            Responsable Information
        </div>
        <div class="card-body">
            <h5 class="card-title">Full Name : {{ $client->fullName}} </h5>
            <p class="card-text">TEL : {{ $client->telRes}}</p>
            <p class="card-text">E-mail : {{ $client->emailRes}}</p>
        </div>
    </div>
</div>
@endsection


