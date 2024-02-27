@extends('layouts.app')

@section('title')
    Show Service
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                Service Information
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">Service name : {{ $service->name }} </h5>
                        <p class="card-text">Service price : {{ $service->price }}</p>
                        <p class="card-text">TVA : {{ $service->tva }}%</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
