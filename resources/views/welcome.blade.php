<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
                        <a href="{{ url('/') }}" class="nav-link active">Home</a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('sort') }}" class="nav-link ">Sort</a>

                    </li>
                </ul>

            </div>
        </div>
    </nav>





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

            @foreach($products as $product)

                <div class="col-3 mb-3">
                    <div class="card">
                        <img src="{{$product->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">$ {{$product->price}}</p>
                            <hr>
                            <b class="text-info">category : </b>
                            @foreach($product->category as $item)
                                <b class="text-dark "> {{  $item->name ."  " ?? "*"}} </b>
                            @endforeach
                        </div>
                    </div>
                </div>

            @endforeach


        </div>
{{$products->links('pagination::bootstrap-4')}}
    </div>


>


<script
    src="https://code.jquery.com/jquery-3.6.1.slim.js"
    integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk="
    crossorigin="anonymous"></script>
<script src="{{asset('assets/main.js?v='. uniqid())}}"></script>
</body>
</html>
