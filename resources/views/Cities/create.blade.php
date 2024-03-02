@extends('layouts.app')

@section('title')
    New City
@endsection

@section('content')
    <!-- Top bar section start here -->
    <div class="container-fluid">
        <div class="text-end mt-3 top-bar">
            <div class="row align-items-end text-end">
                <h5 class="col order-end">Create a new City</h5>
            </div>
        </div>
    </div>
    <!-- Top bar section end here -->
    @if ($errors->any())
        <div class="container alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="row mt-2">
            <div class="col text-start">
                <h5>City Information</h5>
            </div>
            <div class="col text-end mb-2">
                <a href="{{ route('cities.import.form')}}" class="btn btn-danger">
                    <i class='bx bx-upload'></i> Import city list
                </a>
            </div><hr>
        </div>
        <form class="row g-3" method="POST" action="{{ route('cities.store') }}">
            @csrf
            
            <div class="col-12">
                <label for="inputname4" class="form-label">Name</label>
                <input type="text" name="name" value="" class="form-control" id="inputname4" placeholder="City Name">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
