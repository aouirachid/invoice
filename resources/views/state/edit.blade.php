@extends('layouts.app')

@section('title')
    Edit State
@endsection

@section('content')
    <!-- Top bar section start here -->
    <div class="container-fluid">
        <div class="text-end mt-3 top-bar">
            <div class="row align-items-end text-end">
                <h5 class="col order-end">Edit State</h5>
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
        <form class="row g-3" method="POST" action="{{ route('states.update', $state->id) }}">
            @csrf
            @method('put')
            <h5>State Information</h5>
            <hr>
            <div class="col-12">
                <label class="form-label">City List</label>
                <select name="city" class="form-control">
                    @foreach ($city as $cities)
                        <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="inputname4" class="form-label">State</label>
                <input type="text" name="name" value="{{ $state->state }}" class="form-control" id="inputname4"
                    placeholder="State Name">
            </div>
            <div class="col-6">
                <label for="inputname4" class="form-label">Zip Code</label>
                <input type="text" name="zipcode" value="{{ $state->zipcode }}" class="form-control" id="inputname4"
                    placeholder="Zip Code">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
