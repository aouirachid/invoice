@extends('layouts.app')

@section('title')
    Edit City
@endsection

@section('content')
    <!-- Top bar section start here -->
    <div class="container-fluid">
        <div class="text-end mt-3 top-bar">
            <div class="row align-items-end text-end">
                <h5 class="col order-end">Edit City</h5>
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
        <form class="row g-3" method="POST" action="{{ route('cities.update',$city->id) }}">
            @csrf
            @method('put')
                <h5>City Information</h5><hr>
            <div class="col-12">
                <label for="inputname4" class="form-label">Name</label>
                <input type="text" name="name" value="{{$city->name}}" class="form-control" id="inputname4" placeholder="City Name">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection