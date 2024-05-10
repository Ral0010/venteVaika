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
                <div class="row" style="padding: 10px;">
                    <div class="col-sm">
                        <div class="float-start">
                            <a href="" style="font-size: 30px;"
                                  class="link-secondary link-underline link-underline-opacity-0"><i class="fa-solid fa-left-long" style="color: #0d6efd;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="float-end">                                   
                            <button type="button" name="validerComm" class="btn btn-success">Valider commande</button>
                        </div>
                  </div>
                <p>
                    <h2 style="font-family : garamond;"><strong>INFOS CLIENT</strong></h2>
                    <h6><i><b>Selectionner le client</b></i></h6>
                </p>
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                    </div>
                    <div class="col-md-8"></div>
                </div>
                    <div class="row">
                          <div class="col-md-4">
                                <label for="nomCli">CIN:</label>
                                <input type="text" name="nomCli" id="nomCli" class="form-control" required>
                          </div>
                          <div class="col-md-4">
                            <label for="adresseCli">Nom:</label>
                            <input type="text" name="adresseCli" id="adresseCli" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="contactCli">Téléphone:</label>
                            <input type="text" name="contactCli" id="contactCli" class="form-control">
                        </div>
                    </div>
                </div>
                <p>
                    <h2 style="font-family : garamond;"><strong>Liste panier</strong></h2>
                </p>
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
                                                <button type="submit" class="btn btn-danger btn-sm">Annuler</button>
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