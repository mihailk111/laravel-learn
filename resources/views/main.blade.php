@extends("welcome")


@section("content")
         <nav class="navbar navbar-light bg-light shadow rounded mb-3">
            <div class="container-fluid">
                <span class="navbar-text">
                    {{ route("show_main") }}
                </span>
                          <a class="nav-link active btn btn-primary fs-6 fw-bold" aria-current="page" href="{{ route("show_create_zametku") }}">Create New</a>
            </div>
            </nav>

@foreach ($zametki as $zametka )

 <div class="row zametka border border-primary mb-2 rounded overflow-hidden" style="">

    <div class="col d-flex align-items-start justify-content-start flex-column p-3 overflow-scroll" style="">
      <h3>{{ $zametka->title }}</h3>
      <p>{{ $zametka->text }}</p>
      <ul class="list-group list-group-numbered">
         @foreach ($zametka->urls as $url)
           <li class="list-group-item"> <a class="stretched-link" href="{{ $url->url }}">{{ substr($url->url, 0, 35) . " ..."  }}</a>  </li> 
         @endforeach
      </ul>
    </div>

   <div class="col p-3">
         <a href="{{ route("show_zametku", $zametka->id) }}" class="stretched-link"></a>
         <img class="image img-thumbnail rounded " src="{{ $zametka->urls->sortByDesc("id")->first()->url ?? $emptyImgUrl }}" alt="" srcset=""> 
   </div>

 </div>   

@endforeach

@endsection