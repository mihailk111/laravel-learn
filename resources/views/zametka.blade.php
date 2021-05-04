@extends("welcome")

@section("content")


         <nav class="navbar navbar-light bg-light shadow rounded mb-3">
            <div class="container-fluid">
                <div class="row d-flex justify-content-between" style="width:100%;">
                    <div class="col">

                <span class="navbar-text">
                    {{ route("show_zametku", $zametka->id) }}
                </span>

                    </div>
                    <div class="col d-flex justify-content-end">

                        <a class="nav-link active btn btn-primary fs-6 ml-3 fw-bold" aria-current="page" href="{{ route("show_create_zametku") }}">Create New</a>
                        <a class="nav-link active btn btn-primary fs-6 ml-3 fw-bold" aria-current="page" href="{{ route("show_main") }}">Main</a>
                    </div>
                </div>

            </div>
            </nav>


 <div class="row zametka border border-primary mb-2 rounded ">

    <div class="col-12 d-flex align-items-start justify-content-start flex-column p-3">
      <h3>{{ $zametka->title }}</h3>
      <p>{{ $zametka->text }}</p>
    </div>

</div>   

<div class="row border border-primary mb-2 rounded ">

@if ($zametka->urls->first())
    
    @foreach ($zametka->urls as $url)
    
        <div class="col-12 p-3 d-flex flex-column align-items-center">
            <a href="{{ $url->url }}" class="stretched-link"></a>
            <img class="image img-thumbnail rounded " src="{{ $url->url }}" alt="{{ $url->url }}" srcset=""> 
        </div>
    @endforeach

@else

        <div class="col-12 p-3">
            <img class="image img-fluid rounded " src="{{ $emptyImgUrl }}" alt="{{ $emptyImgUrl }}" srcset=""> 
        </div>

@endif

</div>


@endsection