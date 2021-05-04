@extends("welcome")


@section("content")
<div>
            <nav class="navbar navbar-light bg-light shadow rounded mb-5">
            <div class="container-fluid">
                <span class="navbar-text">
                    {{ route("show_create_zametku") }}
                </span>
                    <a class="nav-link active btn btn-primary " aria-current="page" href="{{ route("show_main") }}">Main</a>
            </div>
            </nav>

    <form action="/zametka/create" method="POST" id="new_zametka_form">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label" >Title</label> 
            <input type="text" class="form-control" name="title" id="title">
    @error('title')
       {{$message}} 
    @enderror
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <input type="text"  class="form-control" name="text" id="text">

    @error('text')
       {{$message}} 
    @enderror
        </div>

        <div class="mb-3">
            <label for="url-1" class="form-label">Url 1</label>
            <input type="text" name="url-1" class="form-control" id="url-1"> 
        </div>

    @error('url-1')
       {{$message}} 
    @enderror

        <div class="mb-3">

            <button id="newUrlButton" class="form-control" type="button">New Url</button>
        </div>

        <div class="mb-3">
            <input id="submit" class="form-control" type="submit" placeholder="Submit">
        </div>

        
    </form>
</div>

<script>
    const form = document.querySelector("#new_zametka_form");
    const newUrlButton =  document.querySelector("#newUrlButton");
    const submitButton = document.querySelector("#submit");

    let urlCounter = 2;

    function makeUrl(urlCounter) {

        let newUrlInputTemplate = `

            <div class="mb-3">
                <label for="urls" class="form-label">Url ${urlCounter}</label> </br>
                <input type="text" name="urls[]" class="form-control" id="url-${urlCounter}"> 
            </div>
        `;

       return newUrlInputTemplate;
    }

    newUrlButton.addEventListener("mousedown", ()=>{
       newUrlButton.insertAdjacentHTML("beforebegin", makeUrl(urlCounter++));
    })
 
</script>

@endsection