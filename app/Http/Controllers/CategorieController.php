<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application|RedirectResponse
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
                'category' => new Categorie(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request)
    {
        try {

            Categorie::create($request->validated());
            return redirect()->route('admin.categories.index')
                ->with('success', 'Catégorie crée avec succès');

        }catch (Exception $exception){

            return redirect()->route('admin.categories.index')
                ->with('error', 'Catégorie ne peut pas être crée');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie): \Illuminate\Contracts\View\View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.categories.form',
            [
                'categorie' => $categorie,
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
}
