@extends("backend.layouts")
@section("title", "Dashboard")
@section("content-title", "Kriteria")
@section('css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endsection
@section("content")

<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Kriteria<span class="float-right"> <a href="{{ route('criteria.store') }}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus">Tambah Kriteria</i></a></span></h6>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Luas Bangunan</th>
                            <th>Fasilitas</th>
                            <th>Kamar Mandi</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($criteria as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->luas_bangunan }}</td>
                                <td>
                                    @foreach ($item->fasilitas as $items)
                                        {{ $items }},
                                    @endforeach
                                </td>
                                <td>{{ $item->kamar_mandi }}</td>
                                <td>{{ $item->rating }}</td>
                                <td>
                                    <form action="{{ route('criteria.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{-- modal create --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('criteria.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="luas_bangunan" class="col-form-label">Luas Bangunan</label>
                        <input type="text" name="luas_bangunan" class="form-control" id="luas_bangunan">
                    </div>
                    <div class="form-group">
                        <label for="fasilitas_kamar" class="col-form-label">Fasilitas</label>
                        <input type="text" name="fasilitas_kamar" class="form-control" id="fasilitas_kamar">
                    </div>
                    <div class="form-group">
                        <label for="kamar_mandi" class="col-form-label">Kamar Mandi</label>
                        <input type="text" name="kamar_mandi" class="form-control" id="kamar_mandi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>


@endsection
