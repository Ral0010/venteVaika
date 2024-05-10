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
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icon/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icon/css/fontawesome.min.css') }}" rel="stylesheet">
    <title>User</title>
</head>
<body>
    <div class="d-flex">
        @extends('layout/app')
        @section('content')
        <div class="container-fluid">
            <h1 style="font-family : cambria ; text-align : center; padding: 15px;">Administrateur/Utilisateur</h1>
            <button type="button" class="btn btn-success my-3" data-bs-target="#ajoutUtilisateur" data-bs-toggle="modal">
                <i class="fas fa-plus"></i> 
                <span>Ajouter</span>
            </button>
            <div class="row row-cols-4">
                <div class="col-md-3">
                    <div class="card shadow my-3">
                        <div class="card-header card-header text-center bg-dark" style= "color : white"><h4>BG</h4></div>
                        <div class="card-body">                   
                           <p>Téléphone : <span>034 71 386 49</span></p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <form action="" method="post" style="text-align: center">
                                <button type="submit" name="deleteUser" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow my-3">
                        <div class="card-header card-header text-center bg-dark" style= "color : white"><h4>LDRC</h4></div>
                        <div class="card-body">                   
                           <p>Téléphone : <span>034 71 386 49</span></p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <form action="" method="post" style="text-align: center">
                                <button type="submit" name="deleteUser" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow my-3">
                        <div class="card-header card-header text-center bg-dark" style= "color : white"><h4>LOIC</h4></div>
                        <div class="card-body">                   
                           <p>Téléphone : <span>034 71 386 49</span></p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <form action="" method="post" style="text-align: center">
                                <button type="submit" name="deleteUser" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow my-3">
                        <div class="card-header card-header text-center bg-dark" style= "color : white"><h4>MANANA</h4></div>
                        <div class="card-body">                   
                           <p>Téléphone : <span>034 71 386 49</span></p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <form action="" method="post" style="text-align: center">
                                <button type="submit" name="deleteUser" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                
            
        </div>
        <div class="modal fade" id="ajoutUtilisateur" tabindex="-1" aria-labelledby="ajoutUtilisateurLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ajoutUtilisateurLabel">Ajout d'un nouveau administrateur ou un utilisateur</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="./models/utilisateur.php" method="post">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nomUtilisateur">Nom :</label>
                                            <input type="text" class="form-control" name="nomUtilisateur" id="nomUtilisateur" placeholder="..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="numUtilisateur">Téléphone :</label>
                                            <input type="text" class="form-control" name="numUtilisateur" id="numUtilisateur" placeholder="..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="mdpUtilisateur">Mot de passe :</label>
                                            <input type="text" class="form-control" name="mdpUtilisateur" id="mdpUtilisateur" placeholder="..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="mdpUtilisateur">E-mail :</label>
                                            <input type="text" class="form-control" name="mdpUtilisateur" id="mdpUtilisateur">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" name="cancelUser" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" name="addUser" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
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