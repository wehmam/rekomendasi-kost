<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand ml-5" href="{{url('/frontend/home')}}">KostKu</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                  <form class="form-inline" action="{{ url('/frontend/home') }}">
                    <input class="form-control mr-sm-2 rounded-pill" style="width: 500px" type="search" placeholder="Search" aria-label="Search" name="keyword">
                    <button class="btn btn-outline-success my-2 my-sm-0 rounded-pill" type="submit">Search</button>
                  </form>
                </div>
            </nav>
        </div>
    </div>
</div>
