<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Commande</title>
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
            <div class="card" style="margin-top: 10px">
                <div class="card-header">
                    <h1 style="font-family : cambria ;"><strong>Validation de l'achat</strong></h1>
                </div>              
                
                <div class="card-body">
                    <div class="row" style="padding: 10px;">
                       
                            
                        <p>
                            <h6><i><b>Selectionner le client</b></i></h6>
                        </p>
                        <div class="row">
                            <div class="col-md-8">
                                <form action="{{ route('commande.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <select class="form-select" name="client" defaultValue="">
                                        <option value="" selected disabled hidden>Choisir un client</option>
                                        @foreach ($listeCli as $client)
                                            <option value="{{ $client->idCli }}" class="form-select">
                                                {{ $client->nomCli }} &nbsp;&nbsp; CIN: {{$client->cinCli}}&nbsp; &nbsp; Tel: {{$client->telCli}}&nbsp; &nbsp; Adresse: {{$client->adrCli}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="row">
                                    <div class="col-sm" >
                                        <div class="float-start" style="display: flex; margin-top: 10px">  
                                        <button class="btn btn-primary" style="width: 160px" data-bs-toggle="modal"
                                        data-bs-target="#ajoutModal">Nouveau client</button>
                                        </div>
                                    </div> 
                                    <div class="col-sm">
                                        <div class="float-end" style="display: flex; margin-top: 10px">  
                                            <button type="submit" name="validerComm" class="btn btn-success" style="width: 160px">Valider commande</button>                                
                                        </div>
                                    </div>
                                    </div>
                                </form>

                                    
                                                   
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
                                            <form action="{{ route('client.store2commande') }}" method="POST" >
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
                        </div>
                            
                            <hr style="margin-top: 50px">
                            <div class="d-flex" style="flex-direction: column">
                                <div class="col-sm">
                                    <div class="float-end" style="display: flex; margin-top: 10px">  
                                                                        
                                    </div>
                                </div>
                                
                            </div>
                        
                        </div>


                        <hr>
                        <div class="card-header">
                            <h2 style="font-family : garamond;"><strong>Panier</strong></h2>
                        </div>
                        <hr>
                        <div class="row g-4 mb-4">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left" id="tbCom">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col" class="text-center">N° Immatriculation</th>
                                            <th scope="col"class="text-center">model</th>
                                            <th scope="col"class="text-center">Moteur</th>
                                            <th scope="col"class="text-center">Couleur</th>
                                            <th scope="col"class="text-center">Prix(MGA)</th>
                                            <th scope="col"class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach ($panier as $pani)                                     
                                            <tr>
                                                <td class="col text-right">{{ $pani->idV}}</td>
                                                <td class="col text-center">{{ $pani->numIm}}</td>
                                                <td class="col text-center">{{ $pani->modelV}}</td>
                                                <td class="col text-center">{{ $pani->moteur}}</td>
                                                <td class="col text-center">{{ $pani->couleur}}</td>
                                                <td class="col text-center">{{ $pani->prixV}}</td>
                                                <td class="col text-center">
                                                    <form action="{{ route('commande.AnnulerCommande') }}" method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="voiture" value="{{ $pani->idV }}">
                                                        <button type="submit" class="btn"><i class="fas fa-trash text-danger"></i></button>                                                     
                                                    </form>
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
            
            $('#tbCom').DataTable();
        });
    </script>
    
</body>
</html>