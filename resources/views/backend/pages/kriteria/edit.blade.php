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
            <form action="{{ route('criteria.update', $criteria->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="luas_bangunan" class="col-form-lafabel">Luas Bangunan</label>
                        <input type="text" name="luas_bangunan" class="form-control" id="luas_bangunan" value="{{ $criteria->luas_bangunan }}">
                    </div>
                    <div class="form-group">
                        <label for="fasilitas_kamar" class="col-form-label">Fasilitas</label>
                        <input type="text" name="fasilitas_kamar" class="form-control" id="fasilitas_kamar" value="{{ $criteria->fasilitas_kamar }}">
                    </div>
                    <div class="form-group">
                        <label for="kamar_mandi" class="col-form-label">Kamar Mandi</label>
                        <input type="text" name="kamar_mandi" class="form-control" id="kamar_mandi" value="{{ $criteria->kamar_mandi }}">
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