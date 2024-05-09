
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menuPrincipale</title>
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icon/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icon/css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

</head>
    <style>
        .nav-pills li a:hover {
              background-color:  rgb(31, 104, 59);
        }
        .dropdown-item:hover {
              background-color: rgb(31, 104, 59);
              border-radius: 10px;
        }
    </style>
<body>
    <div class="bg-dark col-auto col-md-2 min-vh-100 d-flex flex-column justify-content-between">
        <div class="bg-dark p-2">
             <div>
                <img src="{{ asset('image/vim.ico') }}" alt="" width="100%" height="70px">
             </div>
             <ul class="nav nav-pills flex-column mt-4 ">
                <li class="nav-item py-2 py-sm-0">
                    <a href="{{ route('voiture.index') }}" class="nav-link text-white" aria-current="page">
                        <i class="fa-solid fa-car"></i>
                        <span class="nav-link-text">Gestion des voitures</span>
                    </a>
                </li>
                <li class="nav-item py-2 py-sm-0">
                    <a href="http://127.0.0.1:8000/com" class="nav-link text-white">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="nav-link-text">Commande</span>
                    </a>
                </li>
                <li class="nav-item py-2 py-sm-0">
                    <a href="http://127.0.0.1:8000/listeV" class="nav-link text-white">
                        <i class="fa-solid fa-diamond"></i>
                        <span class="nav-link-text">Liste de ventes</span>
                    </a>
                </li>
                <li class="nav-item py-2 py-sm-0">
                    <a href="http://127.0.0.1:8000/user" class="nav-link text-white">
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
            <div class="dropdown-menu bg-light" aria-labelledby="triggerId">
                <button class="dropdown-item" href="#">
                    <i class="fa-solid fa-gear"></i>
                    <span>Paramètre</span>
                </button>
                <hr>
                <button class="dropdown-item " href="#">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Deconnexion</span>
                </button>
            </div>
        </div>
    </div>    
         @yield('content')

   <script src="{{ asset('dist/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
	<script>
	$(document).ready(function () {
	    $('#tbV').DataTable();
	});
	</script>
</body>
</html>