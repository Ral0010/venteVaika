<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Commande</title>
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icon/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icon/css/fontawesome.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        @extends('layout/app')
        @section('content')
            <div class="container-fluid ">
                <h1>Hello word</h1>
            </div>
        @endsection

   {{--  script bootstrap  --}}
    <script src="{{ asset('dist/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    
</body>
</html>