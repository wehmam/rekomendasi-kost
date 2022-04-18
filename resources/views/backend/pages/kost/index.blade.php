@extends("backend.layouts")
@section("title", "Dashboard")
@section("content-title", "Kost")
@section('css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endsection
@section("content")

<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Kost<span class="float-right"> <a href="{{ route('kost.store') }}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus">Add Kost</i></a></span></h6>
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
                            <th>Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Province</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kost as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->province }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->photo[0]->image) }}" width="100px">
                                </td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <form action="{{ route('kost.destroy',$item->id) }}" method="POST">

                                        {{-- <a class="btn btn-primary" href="{{ route('kost.edit',$item->id) }}">Edit</a> --}}

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
            <form action="{{ route('kost.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="address">
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="price">
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-form-label">City</label>
                        <input type="text" name="city" class="form-control" id="city">
                    </div>
                    <div class="form-group">
                        <label for="province" class="col-form-label">Province</label>
                        <input type="text" name="province" class="form-control" id="province">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-form-label">Phone</label>
                        <input type="number" name="phone" class="form-control" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-form-label">Image</label>
                        <input type="file" name="upload_image[]" class="form-control rounded-8px product_image" {{ isset($kost) ? "" :"required" }}>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="description">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Fasilitas</label>
                        <div class="form-group form-check">
                            {{-- <label for="description" class="col-form-label">Fasilitas</label><br> --}}
                            <input type="checkbox" name="fasilitas[]" class="form-check-input" value="AC">
                            <label class="form-check-label">AC</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="fasilitas[]" class="form-check-input" value="Carport">
                            <label class="form-check-label">Carport</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="fasilitas[]" class="form-check-input" value="Garden">
                            <label class="form-check-label">Garden</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="fasilitas[]" class="form-check-input" value="Garasi">
                            <label class="form-check-label">Garasi</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="fasilitas[]" class="form-check-input" value="PAM">
                            <label class="form-check-label">PAM</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="fasilitas[]" class="form-check-input" value="Water Heater">
                            <label class="form-check-label">Water Heater</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="fasilitas[]" class="form-check-input" value="Dapur">
                            <label class="form-check-label">Dapur</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="fasilitas[]" class="form-check-input" value="Kulkas">
                            <label class="form-check-label">Kulkas</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kamar Mandi</label>
                        <select class="form-control" name="kamar_mandi" id="kamar_mandi">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value=">10">>10</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Rating</label>
                        <select class="form-control" name="rating" id="rating">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Luas Bangunan</label>
                        <input type="number" class="form-control" name="luas_bangunan" id="luas_bangunan">
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
