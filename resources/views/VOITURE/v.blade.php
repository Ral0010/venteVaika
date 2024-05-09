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
                        <h1 style="font-family : cambria ; text-align : center; padding: 15px;"><strong>LISTE DES VOITURES</strong></h1>
                </div>
                <div class="app-content container">
                    <div>
                        <div class="row py-3">
                                <div class="col-md-12">
                                    <div class="float-end d-flex">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#ajoutModal">
                                                <i class="fas fa-plus"></i>&nbsp;<span>Nouveau</span>
                                            </button>
                                    </div> 
                                </div>
                        </div>
                        <div class="modal fade" id="ajoutModal" tabindex="-1" aria-labelledby="ajoutModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                  <div class="modal-content">
                                        <div class="modal-header">
                                              <p>
                                                <h1 class="modal-title" id="ajoutModalLabel"><strong>AJOUT VOITURE</strong></h1>
                                              </p>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('voiture.store') }}" method="GET" >
                                            {{--ceci le directive --}}
                                            @method('POST')
                                            @csrf
                                            {{--ceci le directive --}}
                                              <div class="modal-body">
                                                    <div class="row">
                                                          <div class="col-sm">
                                                                <label for="numIm"><strong>N° Immatriculation</strong></label>
                                                                <input type="text" class="form-control" id="numIm" name="numIm"
                                                                      placeholder="..." required>
                                                          </div>
                                                    </div>
                                                    <div class="row row-cols-2">
                                                          
                                                        <div class="col-sm-4">
                                                              <label for="modelV"><strong>Modèle</strong></label>
                                                              <input type="text" class="form-control" id="modelV" name="modelV"
                                                                      placeholder="..." required>
                                                          </div>
                                                          <div class="col-sm">
                                                                <label for="couleur"><strong>Couleur</strong></label>
                                                                <input type="text" class="form-control" id="couleur" name="couleur"
                                                                    placeholder="...">
                                                            </div>
                                                    </div>
                                                    <div class="row row-cols-2">                                                 
                                                        <div class="col-sm">
                                                            <label for="moteur"><strong>Moteur</strong></label>
                                                            <input type="text" class="form-control" id="moteur" name="moteur"
                                                                  placeholder="...">
                                                      </div>
                                                        <div class="col-sm">
                                                            <label for="prixV"><strong>Prix</strong></label>
                                                            <input type="text" class="form-control" id="prixV" name="prixV"
                                                                    placeholder="..." required>
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
                                                    <th scope="col">ID</th>
                                                    <th scope="col" class="text-center">N° Immatriculation</th>
                                                    <th scope="col"class="text-center">model</th>
                                                    <th scope="col"class="text-center">Moteur</th>
                                                    <th scope="col"class="text-center">Prix(MGA)</th>
                                                    <th scope="col"class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($result as $voiture)
                                            <tr >
                                                <td class="col text-right">{{ $voiture->idV}}</td>
                                                <td class="col text-center">{{ $voiture->numIm}}</td>
                                                <td class="col text-center">{{ $voiture->modelV}}</td>
                                                <td class="col text-center">{{ $voiture->moteur}}</td>
                                                <td class="col text-center">{{ $voiture->prixV}}</td>
                                                <td class="col text-center">
                                                    <div class="dropdown">
                                                        <button class="btn" type="button" id="tabDown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="fas fa-ellipsis"></span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="tabDown">
                                                            <span>
                                                                <a href="{{ route('voiture.edit', ['id'=> $voiture->idV]) }}" class="dropdown-item"><i class="fas fa-trash text-primary"></i> <span>Modifier</span></a>
                                                            </span>
                                                            <span>
                                                                <form action="{{ route('voiture.destroy', ['voiture'=> $voiture->idV]) }}" method="POST">
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
   <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
	<script>
        //datatable
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