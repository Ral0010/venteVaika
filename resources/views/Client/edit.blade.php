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
            <div class="container">
                <div class="app-content pt-3 p-md-3 p-lg-4 container-fluid" style=" float: right;">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif   
                {{--ceci le directive --}}
                <form action="{{ route('client.update', ['idCli'=> $modific->idCli]) }}" method="POST" >
                    @method('POST')
                    @csrf
                        {{--ceci le directive --}}
                          <div class="modal-body">
                          <h1 class="text-center">Modification</h1>
                                <div class="row">
                                      <div class="col-sm">
                                            <label for="cinCli"><strong>CIN</strong></label>
                                            <input type="text" class="form-control" id="cinCli" name="cinCli"
                                                  value="{{ $modific->cinCli }}">
                                      </div>
                                </div>
                        
                                <div class="row row-cols-2">                                                 
                                    <div class="col-sm">
                                        <label for="nomCli"><strong>Nom du client</strong></label>
                                        <input type="text" class="form-control" id="nomCli" name="nomCli"
                                        value= "{{ $modific->nomCli }}">
                                  </div>
                                    <div class="col-sm">
                                        <label for="telCli"><strong>Telephone</strong></label>
                                        <input type="text" class="form-control" id="telCli" name="telCli" value=" {{ $modific->telCli }} "
                                        >
                                    </div>
                                    <div class="col-sm">
                                        <label for="adrCli"><strong>Adresse</strong></label>
                                        <input type="text" class="form-control" id="adrCli" name="adrCli" value=" {{ $modific->adrCli }} "
                                        >
                                    </div>
                                </div>
                          </div>
                          <div class="modal-footer">
                                <button type="button" class="btn btn-secondary mb-3"
                                      data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-success mb-3" name="modif">Modifier</button>
                          </div>
                    </form>
                </div>    
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