@extends('layouts.app')

@section('title')
    City List
@endsection

@section('content')
<div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>City</th>
                <th>Number Of State</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->states_count }}</td>
                    <td>
                        <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-success" title="edit">
                            <i class='bx bx-edit-alt'></i>
                        </a>
                        <form style="display: inline" method="POST" onsubmit="return deleteConfirmation()" action="{{ route('cities.destroy', $city->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"> <i class='bx bxs-trash'></i> </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<script>
    function deleteConfirmation() {
        let result = confirm("Are you sure you want to delete this City?");
        if (result) {
            alert("Service deleted successfully");
            return true;  // Proceed with form submission
        } else {
            alert("Deletion canceled");
            return false; // Cancel form submission
        }
    }
</script>