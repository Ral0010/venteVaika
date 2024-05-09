<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\voiture;

class voitureControler extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     * Display a listing of the resource.
     */
    public function index()
    {   
        $result = voiture::all();
        return view('voiture.v', compact('result'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $res = $request->validate([    
            'numIm' =>'required' ,
            'modelV' =>'required' ,
            'moteur' =>'required' ,
            'couleur' =>'required' ,
            'prixV' =>'required'
        ]);
       voiture::create($res);  
        return redirect()->route('voiture.index')->with('status', 'Ajout réussie!!!');
    } 
    /**
    * Show the form for editing the specified post.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $modific = voiture::where('idV', $id)->first();
        return view('voiture.modif', compact('modific'));
    }
    

/**
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validate = $request->validate([
        'numIm' =>'required' ,
        'modelV' =>'required' ,
        'moteur' =>'required' ,
        'couleur' =>'required' ,
        'prixV' =>'required'
    ]);
    
    $voiture = Voiture::findOrFail($id);
    $voiture->update($validate);

    return redirect()->route('voiture.index')->with('status', 'Modification réussie!!!');
}



    public function create()
    {
        return view('voiture.create');
    }
    /**
     * Display the specified resource.
     *
     * * @param int $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            $result = voiture::find($id);
            return view('voiture.show', compact('result'));
        }
        
    /**
     * Remove the specified resource from storage.
        * 
        * @param int $id
        * @return \Illuminate\Http\Response
     */
    // public function destroy(voiture $voiture)
    // {
    
    //     $voiture->delete();
    //     return redirect()->route('voiture.index')->with('status', 'suppr succes');
    // }
    public function destroy($voiture)
    {
        voiture::where('idV', $voiture)->delete();
     
        return redirect()->route('voiture.index')->with('status', 'Suppresion réussie!!!');
    }

}
