@extends('layouts.app')

@section('title')
    State List
@endsection

@section('content')
<div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>State</th>
                <th>Zip Code</th>
                <th>City</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($state as $state)
                <tr>
                    <td>{{ $state->id }}</td>
                    <td>{{ $state->state }}</td>
                    <td>{{ $state->zipcode }}</td>
                    <td>{{ $state->city ? $state->city->name:'Not Found' }}</td>
                    <td>
                        <!-- Button to trigger the pop-up modal -->
                        {{-- <a href="{{ route('states.show', $state->id) }}" class="btn btn-primary" title="Show">
                            <i class='bx bx-low-vision'></i>
                        </a> --}}
                        <a href="{{ route('states.edit', $state->id) }}" class="btn btn-success" title="edit">
                            <i class='bx bx-edit-alt'></i>
                        </a>
                        <form style="display: inline" method="POST" onsubmit="return deleteConfirmation()" action="{{ route('states.destroy', $state->id) }}">
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