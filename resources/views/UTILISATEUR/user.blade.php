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
        <div class="bg-dark col-auto col-md-2 min-vh-100 d-flex flex-column justify-content-between">
            <div class="bg-dark p-2">
                 <a href="" class="d-flex text-decoration-none mt-1 align-items-center text-white">
                    <i class="fa-solid fa-house-user"></i>
                 </a>
                 <ul class="nav nav-pills flex-column mt-4 ">
                    <li class="nav-item py-2 py-sm-0">
                        <a href="" class="nav-link text-white" aria-current="page">
                            <i class="fa-solid fa-car"></i>
                            <span class="nav-link-text">Gestion des voitures</span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0">
                        <a href="" class="nav-link text-white">
                            <i class="fa-solid fa-layer-group"></i>
                            <span class="nav-link-text">Commande</span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0">
                        <a href="" class="nav-link text-white">
                            <i class="fa-solid fa-diamond"></i>
                            <span class="nav-link-text">Liste de ventes</span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0">
                        <a href="" class="nav-link text-white">
                            <i class="fa-solid fa-users"></i>
                            <span class="nav-link-text">Utilisateur</span>
                        </a>
                    </li>
                    
                 </ul>
            </div>
             <div class="dropdown open p-3">
                <button
                    class="btn  btn-outline-success border-none dropdown-toggle text-white"
                    type="button"
                    id="triggerId"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                <i class="fa-solid fa-screwdriver-wrench"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <button class="dropdown-item" href="#">
                        <i class="fa-solid fa-gear"></i>
                        <span>Paramètre</span>
                    </button>
                    <hr>
                    <button class="dropdown-item" href="#">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>Deconnexion</span>
                    </button>
                </div>
             </div>
        </div>    
        
    <script src="{{ asset('dist/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>