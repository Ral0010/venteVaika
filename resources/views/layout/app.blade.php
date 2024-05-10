
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menuPrincipale</title>
</head>
    <style>
        .nav-pills li a:hover {
              background-color:  rgb(12, 126, 172);
        }
        .dropdown-item:hover {
              background-color: rgb(31, 104, 59);
              border-radius: 10px;
        }
    </style>
<body style="font-family: cambria">
    <div class="bg-dark col-auto col-md-2 min-vh-100 d-flex flex-column justify-content-between">
        <div>
           <img src="{{ asset('image/logo.avif') }}" alt="" width="100%" style="margin: 0; border-radius: 50%">
        </div>
        <div class="bg-dark p-2" style="margin-top: -170px; padding: 0">
             <ul class="nav nav-pills flex-column">
                <li class="nav-item py-2 py-sm-0">
                    <a href="{{ route('voiture.index') }}" class="nav-link text-white" aria-current="page">
                        <i class="fa-solid fa-car"></i>
                        <span class="nav-link-text" style="margin-left: 10px">Voitures</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item py-2 py-sm-0">
                    <a href="{{ route('commande.index') }}" class="nav-link text-white">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="nav-link-text" style="margin-left: 10px">Panier</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item py-2 py-sm-0">
                    <a href="{{ route('vente.index') }}" class="nav-link text-white">
                        <i class="fa-solid fa-diamond"></i>
                        <span class="nav-link-text" style="margin-left: 10px">Journal de ventes</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item py-2 py-sm-0">
                    <a href="{{ route('client.index') }}" class="nav-link text-white">
                        <i class="fa-solid fa-users"></i>
                        <span class="nav-link-text" style="margin-left: 10px">Clients</span>
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
</body>
</html>