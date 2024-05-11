<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class commandeControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $panier = $this->affichagePanier();

        $listeCli = $this->listClient();

        return view('commande.com', [
            'panier' => $panier,
            'listeCli' => $listeCli,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        //Recuperation des informations clients
        $client = $req->input('client');
        $clientValue = DB::table('clients')->where('idCli', $client)->get();

        $cinCli = $clientValue[0]->cinCli;
        $nomCli = $clientValue[0]->nomCli;


        //Recuperation des commandes_temps
        $commandeTemp = DB::table('commande_temp')->get();

        foreach ($commandeTemp as $key) {
            // Insertion des commandes_temp dans commandes
            DB::table('commandes')->insert([
                'idCli' => $client,
                'cinCli' => $cinCli,
                'nomCli' => $nomCli,
                'idV' => $key->idV,
                'modelV' => $key->modelV,
                'numIm' => $key->numIm,
                'prixV' => $key->prixV,
            ]);

            //STATUS PAYER VOITURE
            DB::table('voitures')
                ->where('idV', $key->idV)
                ->update([
                    'etat' => "PAYER",
                ]);
        }

        //Vidage du pannier
        DB::table('commande_temp')->truncate();
        return redirect()->route('commande.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    //PANIER **********************************************
    public function AjoutPanier(Request $req)
    {
        //Enregistrement dans la table temp
        $voitureId = $req->input('voiture');
        DB::table('commande_temp')->insert([
            'idV' => $voitureId,
            'numIm' => $req->input('numIm'),
            'modelV' => $req->input('modelV'),
            'moteur' => $req->input('moteur'),
            'couleur' => $req->input('couleur'),
            'prixV' => $req->input('prixV'),
        ]);

        //Mise à jour du status de la voiture 
        DB::table('voitures')
            ->where('idV', $voitureId)
            ->update([
                'etat' => "EN_COURS",
            ]);

        return redirect()->route('voiture.index')->with('status', 'Ajout dans le panier');
    }

    public function affichagePanier()
    {
        $inBox = DB::table('commande_temp')->get();

        return $inBox;
    }

    public function AnnulerCommande(Request $req)
    {
        $voitureId = $req->input('voiture');

        //Mise à jour du status de la voiture 
        DB::table('voitures')
            ->where('idV', $voitureId)
            ->update([
                'etat' => "Disponible",
            ]);

        DB::table('commande_temp')->where('idV', $voitureId)->delete();
        return redirect()->route('commande.index');
    }

    public function listClient()
    {
        $listCli =  DB::table('clients')->get();
        return $listCli;
    }
}
