@extends("frontend.layout")
@section("title", "kost")
@section('css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .checked{
            color: gold;
        }
    </style>
@endsection
@section("content")
    <div class="container-fluid" style="margin-bottom: 100px">
        <div class="row">
            <div class="col-md-12">
                <img src="/image/image.png" class="d-block w-100" alt="...">
            </div>
            <h1 style="font-size: 50px">Daftar Kost</h1>
        </div>
        <div class="container mt-5">
            @foreach ($kost as $item)
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ Storage::url($item->photo[0]->image) }}" class="card-img-top" height="50%">
                        <div class="card-body">
                            <a href="{{ url('/frontend/show', $item->id) }}">
                                <h5 class="card-title">{{$item->name}}</h5>
                            </a>
                            <p class="card-text" id="stars-dekstop">
                                @for ($i = 0; $i < 5; ++$i)
                                    <i class="fa fa-star checked{{ $item->kriteria->rating<=$i?'-o':'' }}" style="font-size: 10px" aria-hidden="true"></i>
                                @endfor
                            </p>
                            <p class="card-text">
                                <span class="badge badge-success">Rp.{{number_format($item->price)}}</span>
                            </p>
                         </div>
                    </div>
                </div>
                @endforeach
        </div>
            </div>


    @endsection
    @section('js')
    <script>
        function myFunction() {
            if (x.matches) {
                document.querySelectorAll("#stars-dekstop").forEach(function (e){
                    e.style.display = "none";
                })
            }
            else {
                document.querySelectorAll("#stars-dekstop").forEach(function (e){
                    e.style.display = "block";
                })
            }
        }
    </script>
    @endsection
