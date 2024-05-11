<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\voitureControler;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\commandeControler;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VenteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//VOITURE
Route::get('/', [voitureControler::class, 'index'])->name('voiture.index');
Route::get('/Voiture/store', [voitureControler::class, 'store'])->name('voiture.store');
Route::get('/Voiture/create', [voitureControler::class, 'create'])->name('voiture.create');
Route::get('/Voiture/{id}/edit', [voitureControler::class, 'edit'])->name('voiture.edit');
Route::post('/Voiture/{id}', [voitureControler::class, 'update'])->name('voiture.update');
Route::delete('/Voiture/{voiture}/suppr', [voitureControler::class, 'destroy'])->name('voiture.destroy');

//COMMANDE
Route::get('/Com', [commandeControler::class, 'index'])->name('commande.index');
Route::post('/Commande/Store', [commandeControler::class, 'store'])->name('commande.store');

Route::post('/AjoutPanier', [commandeControler::class, 'AjoutPanier'])->name('commande.AjoutPanier');
Route::post('/AnnulerCommande', [commandeControler::class, 'AnnulerCommande'])->name('commande.AnnulerCommande');



//UTILISATEUR
Route::get('/indexUtilisateur', [UtilisateurController::class, 'index'])->name('utilisateur.index');



//CLIENT
Route::get('/Client', [ClientController::class, 'index'])->name('client.index');
Route::post('/Client', [ClientController::class, 'store'])->name('client.store');
Route::post('/Client2', [ClientController::class, 'store2commande'])->name('client.store2commande');
Route::delete('/Client/{client}/destroy', [ClientController::class, 'destroy'])->name('client.destroy');
Route::get('/Client/{idCli}/edit', [ClientController::class, 'edit'])->name('client.edit');
Route::post('/Client/{idCli}', [ClientController::class, 'update'])->name('client.update');

//VENTE
Route::get('/Vente', [VenteController::class, 'index'])->name('vente.index');
