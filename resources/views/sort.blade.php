<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('assets/main.css')}}">
    <style>
        #sortable { list-style-type: none; width: 60%;
            overflow-y: scroll;
            scrollbar-color: rebeccapurple green;
            scrollbar-width: thin;
            overflow-y: scroll;
            height:400px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $( function() {
            $( "#sortable" ).sortable();
        } );
    </script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Sort Data by Client</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link ">Home</a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('sort') }}" class="nav-link active">Sort</a>

                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="loaderspiner d-none">
    <div class="cv-spinner ">
        <h3 class="text-white">جاري التنفيذ ..</h3>
        <span class="spinner"></span>
    </div>
</div>
    <div class="container">
        <div class="row">

            <div class="col-12 mb-5">
                <div class="col-4">

                    <label class="mb-2"> Filter </label>
                    <select class="form-select"  name="filter_by_category">
                        <option value="0">Select Category</option>
                        @foreach($category as $item)
                            <option {{request()->filter == $item->id ? "selected" : ''}} value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <ul id="sortable" >
                @forelse($products as $key=>$item)
                <li rel="{{ $key }}" data-claim="{{ $item->id }}" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$item->name . '  ' . '$'. $item->price}} <img width="50px" class="img-thumbnail" src="{{$item->image}}"></li>

                @empty
                    <li class="text-danger"> No Data Found  </li>
                @endforelse
            </ul>

        </div>
        @if(count($products)> 0)
<button id="sort_btn" class="btn btn-outline-success text-dark">Save</button>
@endif
    </div>




<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

<script src="{{asset('assets/main.js?v='. uniqid())}}"></script>
</body>
</html>
