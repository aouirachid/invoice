@extends('layouts.app')


@section('title')
    New client
@endsection

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

{{-- bootstarp  cdn link:  --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



@section('content')
    <style>
        .top-bar {
            color: rgb(11, 11, 11);
            width: 100%;
            height: auto;
        }
    </style>
    <!-- Top bar section start here -->
    <div class="container-fluid">
        <div class="text-end mt-3 top-bar">
            <div class="row align-items-end text-end">
                <h5 class="col order-end">Create a new client</h5>
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
            <form class="row g-3" method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
              @csrf
                <h5>
                    Company Information <hr>
                </h5>
                <div class="col-md-6">
                  <label for="inputdenomenation4" class="form-label">Denomination</label>
                  <input type="text" name="denomenation" value="{{old('denomenation')}}" class="form-control" id="inputdenomenation4">
                </div>
                <div class="col-md-6">
                  <label for="inputPasswordice4" class="form-label">ice</label>
                  <input type="text" name="ice" value="{{ old('ice') }}" class="form-control" id="inputPasswordice4">
                </div>
                <div class="col-6">
                  <label for="inputAddress" class="form-label">Address</label>
                  <input type="text" name="address" value="{{old('address')}}" class="form-control" id="inputAddress" placeholder="96 Bd d'anfa">
                </div>
                <div class="col-3">
                    <label for="inputTel" class="form-label">Tel</label>
                    <input type="text" name="tel" value="{{old('tel')}}" class="form-control" id="inputTel" placeholder="+212 522 012 121 1">
                  </div>
                  <div class="col-3">
                    <label for="inputemail" class="form-label">E-mail</label>
                    <input type="text" name="email" value="{{old('email')}}" class="form-control" id="inputemail" placeholder="contact@dmrprog.com">
                  </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">City</label>
                  <input type="text" name="city" value="{{old('city')}}" class="form-control" id="inputCity">
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">State</label>
                  <select id="inputState" name="state" value="{{old('state')}}" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="inputZipcode" class="form-label">Zip Code</label>
                  <input type="text" name="zipcode" value="{{old('zipcode')}}" class="form-control" id="inputZipcode">
                </div>
                <div class="col-md-6">
                  <label for="inputTp" class="form-label">Tp</label>
                  <input type="text" name="tp" value="{{old('tp')}}" class="form-control" id="inputTp">
                </div>
                <div class="col-md-4">
                    <label for="inputcnss" class="form-label">Cnss</label>
                    <input type="text" name="cnss" value="{{old('cnss')}}" class="form-control" id="inputcnss">
                </div>
                <div class="col-md-2">
                  <label for="inputif" class="form-label">If</label>
                  <input type="text" name="idf" value="{{old('idf')}}" class="form-control" id="inputif">
                </div>
                <div class="form-group">
                  <label for="logo">Company Logo:</label>
                  <input type="file" name="logo" id="logo" value="{{old('logo')}}" class="form-control">
              </div>
                <h5 class="mt-4">
                    Responsable Information <hr>
                </h5>
                 <div class="col-6">
                  <label for="inputfullName" class="form-label">Full Name</label>
                  <input type="text" name="fullName" value="{{old('fullName')}}" class="form-control" id="inputfullName" placeholder="Aoui Rachid">
                </div>
                <div class="col-3">
                    <label for="inputTel" class="form-label">Tel</label>
                    <input type="text" name="telRes" value="{{old('telRes')}}" class="form-control" id="inputTel" placeholder="+212 522 012 121 1">
                  </div>
                  <div class="col-3">
                    <label for="inputemail" class="form-label">E-mail</label>
                    <input type="text" name="emailRes" value="{{old('emailRes')}}" class="form-control" id="inputemail" placeholder="contact@dmrprog.com">
                  </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
