@extends("backend.layouts")
@section("title", "Dashboard")
@section("content-title", "Edit Kost")
@section('css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endsection
@section("content")


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Kost<span class="float-right"></span></h6>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="card-body">
            <form action="{{ route('kost.update', $kost->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $kost->name }}">
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{ $kost->address }}">
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-form-label">City</label>
                        <input type="text" name="city" class="form-control" id="city" value="{{ $kost->city }}">
                    </div>
                    <div class="form-group">
                        <label for="province" class="col-form-label">Province</label>
                        <input type="text" name="province" class="form-control" id="province" value="{{ $kost->province }}">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-form-label">Phone</label>
                        <input type="number" name="phone" class="form-control" id="phone" value="{{ $kost->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <img src="/image/{{ $kost->image }}" width="300px">
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="description" value="{{ $kost->description }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
