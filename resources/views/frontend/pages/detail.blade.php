@extends("frontend.layout")
@section("title", "Detail")
@section("content-title")
@section('css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .checked{
            color: gold;
        }
    </style>
@endsection
@section("content")


<div class="container">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ Storage::url($kost->photo[0]->image) }}" class="d-block" width="90%">
        </div>
        <div class="col-md-7">
            <div class="card" style="width: 30rem; ">
                <div class="card-body">
                  <h1 class="card-title text-bold text-dark" style="font-size: 30px">Rp. {{ number_format($kost->price) }}</h1>
                    @for ($i = 0; $i < 5; ++$i)
                        <i class="fa fa-star checked{{ $kost->kriteria->rating<=$i?'-o':'' }}" style="font-size: 10px" aria-hidden="true"></i>
                    @endfor
                  <h2 class="card-subtitle mt-2 text-muted" style="font-size: 30px">{{ $kost->name }}</h2>
                  <p class="card-text mt-2">{{ $kost->address }}, {{ $kost->city }}, {{ $kost->province }}</p>
                  <h2 class="card-text mt-2">
                      Hubungi : {{ $kost->phone }}
                  </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <h1 style="font-size: 30px">Detail</h1>

            <table class="table mt-3">
                <tbody>
                  <tr>
                    <th scope="row">Fasilitas</th>
                    @foreach ($kost->kriteria->fasilitas as $item)
                        <td>{{ $item }}</td>
                    @endforeach
                  </tr>
                  <tr>
                    <th scope="row">Kamar Mandi</th>
                    <td>{{ $kost->kriteria->kamar_mandi }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Luas Bangunan</th>
                    <td>{{ $kost->kriteria->luas_bangunan }}</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 style="font-size: 30px">Deskripsi</h1>
            <div class="card" style="width: 30rem; ">
                <div class="card-body">
                  <p class="card-text mt-2">{{ $kost->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
