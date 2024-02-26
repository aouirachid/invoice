@extends('Layouts.app')

@section('title')
    Service List
@endsection

@section('content')
     <!-- Top bar section start here -->
     <div class="container-fluid">
        <div class="text-end mt-3 top-bar">
            <div class="row align-items-end text-end">
                <h5 class="col order-end">Service List</h5>
            </div>
        </div>
    </div>
    <!-- Top bar section end here -->
    <div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Price</th>
                    <th>Tva</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->name}}</td>
                        <td>{{ $service->price}}</td>
                        <td>{{ $service->tva}}</td>
                        <td>
                            <!-- Button to trigger the pop-up modal -->
                            <a href="{{ route('services.show', $service->id) }}">
                                <button type="button" class="btn btn-primary" data-toggle="modal"data-target="#serviceDetailsModal"
                                class="btn btn-primary" title="show"><i class='bx bx-low-vision'></i></button>
                            </a>
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-success" title="edit"><i
                                class='bx bx-edit-alt'></i>
                            </a>
                            <form style="display: inline" method="POST" onsubmit="return deleteConfirmation()" action="{{ route('services.destroy', $service->id) }}">
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
        let result = confirm("Are you sure you want to delete this service?");
        if (result) {
            alert("Service deleted successfully");
            return true;  // Proceed with form submission
        } else {
            alert("Deletion canceled");
            return false; // Cancel form submission
        }
    }
</script>