<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        try {

            $categories = Categorie::all();
            return view('admin.categories.index', compact('categories'));

        } catch (Exception $exception) {

            return redirect()->back()
                ->with('error', 'Catégorie ne peut pas être supprimée');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.form',
            [
                'categorie' => new Categorie(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request): RedirectResponse
    {
        try {
            Categorie::create((new Categorie())->saveImage($request));
            return redirect()->route('categories.index')
                ->with('success', 'Catégorie crée avec succès');
        }catch (Exception $exception){
            return redirect()->route('categories.index')
                ->with('error', 'Catégorie ne peut pas être crée');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.categories.form',
            [
                'category' => $categorie,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorieRequest $request, Categorie $categorie): RedirectResponse
    {
        try {
            $categorie->update($request->validated());

            return redirect()->route('admin.categories.index')
                ->with('success', 'Catégorie mise à jour avec succès');
        } catch (Exception $exception) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Catégorie ne peut pas être mise à jour');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie): RedirectResponse
    {
        try{
            $categorie->delete();
            return redirect()->route('admin.categories.index')
                ->with('success', 'Catégorie supprimée avec succès');
        } catch (Exception $exception) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Catégorie ne peut pas être supprimée');
        }
    }
    public function filtre(String $id)
    {
        $categories = \App\Models\Categorie::all();
        $produits = \App\Models\Produit::where('categorie_id', $id)->get();
        return view('products.index', compact('produits', 'categories'));
    }
}
