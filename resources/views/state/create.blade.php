@extends('layouts.app')

@section('title')
    New State
@endsection

@section('content')
    <!-- Top bar section start here -->
    <div class="container-fluid">
        <div class="text-end mt-3 top-bar">
            <div class="row align-items-end text-end">
                <h5 class="col order-end">Create a new State</h5>
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
                <a href="{{ route('states.import.form')}}" class="btn btn-danger">
                    <i class='bx bx-upload'></i> Import State list
                </a>
            </div><hr>
        </div>
        <form class="row g-3" method="POST" action="{{ route('states.store') }}">
            @csrf
            <label class="form-label">City List</label>
            <select name="city" class="form-control">
                @foreach ($city as $cities)
                    <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                @endforeach
            </select>
            <div class="col-6">
                <label for="inputname4" class="form-label">States Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputname4" placeholder="States Name">
            </div>
            <div class="col-6">
                <label for="inputname4" class="form-label">Zip Code</label>
                <input type="text" name="zipcode" value="{{ old('zipcode') }}" class="form-control" id="inputname4" placeholder="Zip Code">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
