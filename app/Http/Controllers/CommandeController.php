<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Models\Panier;
use App\Models\Stock;
use App\Models\User;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCommandeRequest $request)
    {
        $input=$request->all();
        $user=auth()->user()->id;
        // Partie 1 : Préfixe fixe pour les commandes
        $prefixe = "CMD";

// Partie 2 : Année actuelle
        $annee = date("Y");

// Partie 3 : Mois actuel
        $mois = date("m");

// Partie 4 : Numéro de commande aléatoire
        $num_commande = rand(1000, 9999);

// Concaténation des parties pour former le matricule de commande
        $matricule_commande = $prefixe . "-" . $annee . $mois . "-" . $num_commande;

       $commande= Commande::create([
            'num_commande'=>$matricule_commande,
            'user_id'=>$user,
            'montant'=>$input['montant']
        ]);

        $paniers=Panier::with('produit')->where('user_id',auth()->user()->id)->get();
        foreach ($paniers as $panier) {
            $stock=$panier->produit->getstock();
            $newstock=$stock->quantite-$panier->quantite;
            $stock->update(['quantite'=>$newstock]);
             $user=User::find($panier->produit->user_id);
            $user->notify(new \App\Notifications\SendClientnotification($panier->produit));
            $panier->delete();

        }

        return redirect()->route('index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
