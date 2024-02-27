@extends('Layouts.app')

@section('title')
    New Services
@endsection

@section('content')
    <!-- Top bar section start here -->
    <div class="container-fluid">
        <div class="text-end mt-3 top-bar">
            <div class="row align-items-end text-end">
                <h5 class="col order-end">Create a new service</h5>
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
        <form class="row g-3" method="POST" action="{{ route('services.update',$service->id) }}">
            @csrf
            @method('put')
            <h5>
                Service Information <hr>
            </h5>
            <div class="col-12">
                <label for="inputname4" class="form-label">Name</label>
                <input type="text" name="name" value="{{$service->name}}" class="form-control" id="inputname4" placeholder="Service Name">
            </div>
            <div class="col-md-6">
                <label for="inputprice4" class="form-label">Price</label>
                <input type="number" name="price" value="{{$service->price}}" class="form-control" id="inputprice4" placeholder="Service Price">
            </div>
            <div class="col-md-6">
                <label for="inputTva" class="form-label">Tva</label>
                <input type="number" name="tva" value="{{$service->tva}}" class="form-control" id="inputTva" placeholder="Taux Tva">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>

@endsection
