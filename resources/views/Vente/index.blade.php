<style>
    .nav-pills li a:hover {
          background-color: rgb(17, 59, 19);
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>voiture</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    {{-- <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('icon/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icon/css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

</head>
<body>
    <div class="d-flex">
        @extends('layout/app')
        @section('content')
            <div class="container-fluid ">
                @if (session('status'))
                    <div class="alert alert-succes" style="background-color: rgb(162, 221, 162); color: black; text-align:center; font-weight: bold">
                        {{ session('status')}} 
                    </div>
                @endif
                <ul>
                    @foreach ( $errors->all() as $error)
                        <li class="alert alert-danger "> {{ $error}} </li>
                    @endforeach
                </ul>
                <div class="app-content container">
                    <div class="card" style="min-height: 600px">  
                        <div class="card-header" style="float: left">
                                <h1 style="font-family : cambria ;"><strong>Historique des ventes</strong></h1>
                        </div>      
                        <div class="card-body">
                            <div class="row g-4 mb-4">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0" id="tbV">
                                            <thead>
                                                <tr>
                                                        <th scope="col" class="text-center">CIN</th>
                                                        <th scope="col"class="text-center">Nom</th>
                                                        <th scope="col"class="text-center">Model</th>
                                                        <th scope="col"class="text-center">Immatriculation</th>
                                                        <th scope="col"class="text-center">Prix</th>
                                                        <th scope="col"class="text-center">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ventes as $vente)
                                                <tr >
                                                    <td class="col text-right">{{ $vente->cinCli}}</td>
                                                    <td class="col text-center">{{ $vente->nomCli}}</td>
                                                    <td class="col text-center">{{ $vente->modelV}}</td>
                                                    <td class="col text-center">{{ $vente->numIm}}</td>
                                                    <td class="col text-center">{{ $vente->prixV}}</td>
                                                    <td class="col text-center">{{ $vente->created_at}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>           
                        
                    </div>
                </div>    
            </div>
        @endsection
   {{--  script bootstrap  --}}
   <script src="{{ asset('dist/jquery/jquery.min.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
   {{-- <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script> --}}
   <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
	<script>
        //datatable
        $(document).ready(function () {
            
            $('#tbV').DataTable();
        });
    
    </script>
</body>
</html>