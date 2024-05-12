<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Models\Stock;
use Auth;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $produits = Produit::with('categorie')
            ->paginate(15);
        $categories = \App\Models\Categorie::all();
        return view('products.index', compact('produits', 'categories'));
    }

    public function myProducts(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $produits = Produit::with('user')
            ->where('user_id', Auth::user()->id)
            ->paginate(15);
        $categories = \App\Models\Categorie::all();
        return view('products.index', compact('produits', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('products.create',
            [
                'produit' => new Produit(),
                'categories' => \App\Models\Categorie::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduitRequest $request): RedirectResponse
    {
//        try {
//            Produit::create((new Produit())->saveImage($request));
//            return redirect()->route('admin.produits.index')
//                ->with('success', 'Produit crée avec succès');
//        } catch (Exception $e) {
//            return redirect()->back()->with('error', $e->getMessage());
//        }
        $input = $request->all();
        if($request->hasFile('image')){
            $photoname=time().'.'.$request->image->extension();
            $photopath=$request->file('image')->storeAs('products',$photoname,'public');
            $produit=Produit::create([
                'image'=>$photopath,
                'titre'=>$input['titre'],
                'categorie_id'=>$input['categorie_id'],
                'prix'=>$input['prix'],
                'date_fab'=>$input['date_fab'],
                'date_exp'=>$input['date_exp'],
                'user_id'=>$input['user_id'],
            ]);
            Stock::create([
                'produit_id'=>$produit->id,
                'quantite'=>$input['quantite'],
            ]);


        }
        return redirect()->route('produits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return view('admin.produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('admin.produits.form',
            [
                'produit' => $produit,
                'categories' => \App\Models\Categorie::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduitRequest $request, Produit $produit)
    {
        try {
            $produit->update($request->validated());
            return redirect()->route('admin.produits.index')
                ->with('success', 'Produit mis à jour avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit): RedirectResponse
    {
        try {
            $produit->delete();
            return redirect()->route('admin.produits.index')
                ->with('success', 'Produit supprimé avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
