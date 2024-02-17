@extends('layouts.app')


@section('title')
    welcome
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
            background: #777285;
            color: aliceblue;
            width: 100%;
            height: auto;
        }
    </style>
    <!-- Top bar section start here -->
    <div class="container-fluid">
        <div class="text-center mt-3 top-bar">
            <div class="row align-items-center text-center">
                <h5 class="col order-center">Create a new client</h5>
            </div>
        </div>
    </div>
    <!-- Top bar section end here -->
    <div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded">
            <form class="row g-3">
                <h5>
                    Company Information <hr>
                </h5>
                <div class="col-md-6">
                  <label for="inputdenomenation4" class="form-label">Denomenation</label>
                  <input type="text" name="denomenation" class="form-control" id="inputdenomenation4">
                </div>
                <div class="col-md-6">
                  <label for="inputPasswordice4" class="form-label">ice</label>
                  <input type="text" name="ice" class="form-control" id="inputice4">
                </div>
                <div class="col-6">
                  <label for="inputAddress" class="form-label">Address</label>
                  <input type="text" name="address" class="form-control" id="inputAddress" placeholder="96 Bd d'anfa">
                </div>
                <div class="col-6">
                    <label for="inputTel" class="form-label">Tel</label>
                    <input type="text" name="Tel" class="form-control" id="inputTel" placeholder="+212 522 012 121 1">
                  </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">City</label>
                  <input type="text" name="city" class="form-control" id="inputCity">
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">State</label>
                  <select id="inputState" name="state" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="inputZipcode" class="form-label">Zip Code</label>
                  <input type="text" name="zipcode" class="form-control" id="inputZipcode">
                </div>
                <div class="col-md-6">
                  <label for="inputTp" class="form-label">Tp</label>
                  <input type="text" name="tp" class="form-control" id="inputTp">
                </div>
                <div class="col-md-4">
                    <label for="inputcnss" class="form-label">Cnss</label>
                    <input type="text" name="cnss" class="form-control" id="inputcnss">
                </div>
                <div class="col-md-2">
                  <label for="inputif" class="form-label">If</label>
                  <input type="text" name="idf" class="form-control" id="inputif">
                </div>
                <h5>
                    Responsable Information <hr>
                </h5>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
