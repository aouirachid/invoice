@extends('layouts.app')
@section('title')
    List Client
@endsection

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
                <h5 class="col order-end">List Client</h5>
            </div>
        </div>
    </div>
    <!-- Top bar section end here -->
    <div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Denomenation</th>
                    <th>ice</th>
                    <th>Address</th>
                    <th>Tel</th>
                    <th>E-mail</th>
                    <th>City</th>
                    <th>Tp</th>
                    <th>Cnss</th>
                    <th>If</th>
                    <th>Responsable Name</th>
                    <th>Tel</th>
                    <th>E-mail Responsable</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>

                        <td>{{ $client->denomenation }}</td>
                        <td>{{ $client->ice }}</td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->tel }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->city }}</td>
                        <td>{{ $client->tp }}</td>
                        <td>{{ $client->cnss }}</td>
                        <td>{{ $client->idf }}</td>
                        <td>{{ $client->fullName }}</td>
                        <td>{{ $client->telRes }}</td>
                        <td>{{ $client->emailRes }}</td>
                        <td>
                            <!-- Button to trigger the pop-up modal -->
                            <a href="{{ route('clients.show', $client->id) }}">
                                <button type="button" class="btn btn-primary" data-toggle="modal"data-target="#clientDetailsModal"
                                class="btn btn-primary" title="show"><i class='bx bx-low-vision'></i></button>
                            </a>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-success" title="edit"><i
                                    class='bx bx-edit-alt'></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection

