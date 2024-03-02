@extends('layouts.app')

@section('title')
    New City
@endsection

@section('content')
    <!-- Top bar section start here -->
    <div class="container-fluid">
        <div class="text-end mt-3 top-bar">
            <div class="row align-items-end text-end">
                <h5 class="col order-end">Import a new States</h5>
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
        <form class="row g-3" method="POST" action="{{ route('cities.import') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mt-2">
                <div class="col text-start">
                    <h5>Import List of states</h5>
                </div>
                <hr>
            </div>
            <div class="col-12">
                <label class="form-label">City List</label>
                <select name="city" class="form-control">
                    @foreach ($city as $cities)
                        <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label for="importFile" class="form-label">Choose File (xlsx or csv)</label>
                <input type="file" class="form-control" id="importFile" name="file" accept=".xlsx, .csv">
            </div>
            <button type="submit" class="btn btn-primary">Import</button>

        </form>
    </div>
@endsection
