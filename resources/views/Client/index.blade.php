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
                <div class="container bg-light ">
                        <h1 style="font-family : cambria ; text-align : center; padding: 15px;"><strong>Liste des Client</strong></h1>
                </div>
                <div class="app-content container">
                    <div>
                        <div class="row py-3">
                                <div class="col-md-12">
                                    <div class="float-end d-flex">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#ajoutModal">
                                                <i class="fas fa-plus"></i>&nbsp;<span>Nouveau client</span>
                                            </button>
                                    </div> 
                                </div>
                        </div>
                        <div class="modal fade" id="ajoutModal" tabindex="-1" aria-labelledby="ajoutModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                  <div class="modal-content">
                                        <div class="modal-header">
                                              <p>
                                                <h1 class="modal-title" id="ajoutModalLabel"><strong>Nouveau client</strong></h1>
                                              </p>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>

                                        {{-- Formulaire d'ajout --}}
                                        <form action="{{ route('client.store') }}" method="POST" >
                                            @method('POST')
                                            @csrf
                                              <div class="modal-body">
                                                    <div class="col-sm">
                                                        <label for="cinCli"><strong>CIN</strong></label>
                                                        <input type="text" class="form-control" id="cinCli" name="cinCli"
                                                                placeholder="..." required>
                                                    </div>
                                                    <div class="row">
                                                          <div class="col-sm">
                                                                <label for="nomCli"><strong>Nom du client</strong></label>
                                                                <input type="text" class="form-control" id="nomCli" name="nomCli"
                                                                      placeholder="..." required>
                                                          </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <label for="telCli"><strong>Téléphone</strong></label>
                                                        <input type="text" class="form-control" id="telCli" name="telCli"
                                                                placeholder="..." required>
                                                         
                                                    </div>
                                                    <div class="row row-cols-2">                                                 
                                                        <div class="col-sm">
                                                            <label for="adrCli"><strong>Adresse du client</strong></label>
                                                            <input type="text" class="form-control" id="adrCli" name="adrCli"
                                                                  placeholder="...">
                                                      </div>
                                                    </div>
                                              </div>
                                              <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary mb-3"
                                                          data-bs-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-success mb-3" name="ajout_v">Ajouter</button>
                                              </div>
                                        </form>
                                  </div>
                            </div>
                      </div>
                        <div class="row g-4 mb-4">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="tbV">
                                        <thead>
                                            <tr>
                                                    <th scope="col" class="text-center">CIN</th>
                                                    <th scope="col"class="text-center">Nom</th>
                                                    <th scope="col"class="text-center">Teléphone</th>
                                                    <th scope="col"class="text-center">Adresse</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $client)
                                            <tr >
                                                <td class="col text-right">{{ $client->cinCli}}</td>
                                                <td class="col text-center">{{ $client->nomCli}}</td>
                                                <td class="col text-center">{{ $client->telCli}}</td>
                                                <td class="col text-center">{{ $client->adrCli}}</td>
                                                <td class="col text-center">
                                                    <div class="dropdown">
                                                        <button class="btn" type="button" id="tabDown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="fas fa-ellipsis"></span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="tabDown" style="z-index: 1">
                                                            <span>
                                                                <a href="{{ route('client.edit', ['idCli'=> $client->idCli]) }}" class="dropdown-item"><i class="fas fa-trash text-primary"></i> <span>Modifier</span></a>
                                                            </span>
                                                            <span>
                                                                <form action="{{ route('client.destroy', ['client'=> $client->idCli]) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"  class="dropdown-item"><i class="fas fa-trash text-danger"></i><span>Supprimer</span></button>
                                                                </form>
                                                            </span>
                                                        </div>
                                                        
                                                    </div>
                                
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>
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