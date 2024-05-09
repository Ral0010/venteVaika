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
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icon/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icon/css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

</head>
<body>
    <div class="d-flex">
        @extends('layout/app')
        @section('content')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif 
            <div class="container">
                <div class="container bg-light ">
                    <h1 style="font-family : cambria ; text-align : center; padding: 5px;"><strong>MODIFICATION</strong></h1>
                </div>            
                <form action="{{ route('voiture.update', ['id'=> $modific->idV]) }}" method="POST" >
                    {{--ceci le directive --}}
                    @method('POST')
                    @csrf
                        {{--ceci le directive --}}
                    <div class="row justify-content-md-center">
                        <div class="col-6">
                            <label for="numIm"><strong>N° Immatriculation</strong></label>
                            <input type="text" class="form-control" id="numIm" name="numIm"
                                    value="{{ $modific->numIm }}">
                        </div>
                        <div class="col-6">
                            <label for="modelV"><strong>Modèle</strong></label>
                            <input type="text" class="form-control" id="modelV" name="modelV"
                                    value="{{ $modific->modelV}}">
                        </div>
                    </div>
                    <div class="row justify-content-center">   
                        <div class="col-sm-4">
                            <label for="couleur"><strong>Couleur</strong></label>
                            <input type="text" class="form-control" id="couleur" name="couleur"
                                value="{{ $modific->couleur }}">
                        </div>                                              
                        <div class="col-sm-4">
                            <label for="moteur"><strong>Moteur</strong></label>
                            <input type="text" class="form-control" id="moteur" name="moteur"
                            value= "{{ $modific->moteur }}">
                        </div>
                        <div class="col-sm-4">
                            <label for="prixV"><strong>Prix</strong></label>
                            <input type="text" class="form-control" id="prixV" name="prixV" value=" {{ $modific->prixV }} ">
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-md-center ">
                        <div class="col-auto me-auto">
                            <a href="{{ route('voiture.index') }}"class="link-secondary link-underline link-underline-opacity-0"><i class="fa-solid fa-left-long" style="color: #0d6efd; font-size : 40px"></i></a>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success" name="modif">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>     
        @endsection
   {{--  script bootstrap  --}}
   <script src="{{ asset('dist/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
	<script>
        $(document).ready(function () {
            $('#tbV').DataTable();
        });

         
        //control champ
        document.addEventListener('DOMContentLoaded', function() {
                let champPrix = document.getElementById('prixV');

                function controlerChamp() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                }
                champPrix.addEventListener('input', controlerChamp);
        });
	</script>
</body>
</html>