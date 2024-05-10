<?php

namespace App\Http\Controllers;

use App\Models\commande;
use Illuminate\Http\Request;


class VenteController extends Controller
{
    public function index(){
        $ventes = commande::all();
        return view('Vente.index', ['ventes' => $ventes]);
    }


}
