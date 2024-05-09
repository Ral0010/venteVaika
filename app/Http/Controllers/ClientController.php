<?php

namespace App\Http\Controllers;
use App\Models\client;

use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function index(){
        $clients = client::all();
        return view('Client.index', ['clients' => $clients]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cinCli' => 'required',
            'nomCli' => 'required',
            'telCli' => 'required',
            'adrCli' => 'required',
        ]);
        client::create($data);

        return redirect()->route('client.index')->with('success', 'Client ajouté avec succès.');
    }


    public function edit($idCli)
    {
        $modific = client::where('idCli', $idCli)->first();
        return view('Client.edit', compact('modific'));
    }

    
    public function update(Request $request, $idCli)
    {
        $validate = $request->validate([
            'nomCli' =>'required' ,
            'telCli' =>'required' ,
            'cinCli' =>'required' ,
            'adrCli' =>'required'
        ]);
        
        $client = client::findOrFail($idCli);
        $client->update($validate);

        return redirect()->route('client.index')->with('status', 'Modification réussie!!!');
    }





    //Suppression
    public function destroy($client)
    {
        client::where('idCli', $client)->delete();
     
        return redirect()->route('client.index')->with('status', 'Suppresion réussie!!!');
    }
}
