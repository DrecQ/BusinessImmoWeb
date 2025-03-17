<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Affiche la liste des biens.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Affiche le formulaire de création d'un bien.
     */
    public function create()
    {
        $property = new Property([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'bathrooms' => 1,
            'floor' => 0,
            'city' => 'Cotonou',
            'postal_code' => 7584,
            'sold' => false,
        ]);

        return view('admin.properties.form', [ 
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Enregistre un nouveau bien dans la base de données.
     */
    
        public function store(PropertyFormRequest $request)
        {
            $data = $request->validated();

            /** @var UploadedFile|null  $image  */
            $image = $request->validated('image');

            if ($image !== null && !$image->getError())
             { 
                $data['image'] = $image->store('blog', 'public');
            }

            $property = Property::create($data);
            $property->option()->sync($request->validated('options'));
            return to_route('admin.property.index')->with('success', 'Le bien a été créé avec succès.');
        }

   

    /**
     * Affiche le formulaire d'édition d'un bien.
     */
    public function edit(Property $property)
    {

        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->option()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a été mis à jour avec succès.');
    }

    /**
     * Supprime un bien.
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return to_route('admin.property.index')->with('success', 'Le bien a été supprimé avec succès.');
    }
}

