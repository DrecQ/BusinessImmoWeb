<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionFormRequest;
use App\Models\Option;


class OptionController extends Controller
{
      /**
     * Affiche la liste d'options.
     */
    public function index()
    {
        return view('admin.options.index', [
            'options' => Option::paginate(10),
        ]);
    }

    /**
     * Affiche le formulaire de création d'une option.
     */
    public function create()
    {
        $option = new Option();
        return view('admin.options.form', [ 'option' => $option]);
    }

    /**
     * Enregistre un nouveau bien dans la base de données.
     */
    
        public function store(OptionFormRequest $request)
        {
            $option = Option::create($request->validated());
            return to_route('admin.option.index')->with('success', 'L\'option a été créé avec succès.');
        }

   

    /**
     * Affiche le formulaire d'édition d'une option.
     */
    public function edit(Option $option)
    {

        return view('admin.options.form')->with('option', $option);
    }

    
    public function update(OptionFormRequest $request, option $option)
    {
        $option->update($request->validated());

        return to_route('admin.option.index')->with('success', 'L\'option a été mise à jour avec succès.');
    }

    /**
     * Supprime une option.
     */
    public function destroy(Option $option)
    {
        $option->delete();

        return to_route('admin.option.index')->with('success', 'L\'option a été supprimée avec succès.');
    }
}
