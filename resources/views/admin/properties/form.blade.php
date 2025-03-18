@extends('admin.admin')

@section('title', $property->exists ? "Éditer un bien" : "Créer un bien")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" 
          action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" 
          method="post" enctype="multipart/form-data">

        @csrf 
        @method($property->exists ? 'PUT' : 'POST')

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'name' => 'surface', 'value' => $property->surface])
                @include('shared.input', ['class' => 'col', 'label' => 'Prix', 'name' => 'price', 'value' => $property->price])
            </div>
        </div>

        @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description])

        <!-- Ajout de l'image !-->
        @include('shared.input', ['type' => 'file', 'name' => 'image'])
        @error('Image')
            @include('shared.flash')
        @enderror



        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
            @include('shared.input', ['class' => 'col', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
            @include('shared.input', ['class' => 'col', 'label' => 'Salle de bain', 'name' => 'bathrooms', 'value' => $property->bathrooms])
            @include('shared.input', ['class' => 'col', 'label' => 'Étage', 'name' => 'floor', 'value' => $property->floor])
        </div>

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
            @include('shared.input', ['class' => 'col', 'label' => 'Ville', 'name' => 'city', 'value' => $property->city])
            @include('shared.input', ['class' => 'col', 'label' => 'Code Postal', 'name' => 'postal_code', 'value' => $property->postal_code])
        </div>

        @include('shared.select', ['name' => 'options', 'label' => 'Options', 'value' => $property-> options()-> pluck('id'), 'multiple' => true])
        @include('shared.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'value' => old('sold', $property->sold ?? false), 'option'=> $options])

        <div>
            <button type="submit" class="btn btn-primary">
                @if($property->exists)
                    Modifier
                @else
                    Creer
                @endif
            </button>
        </div>
    </form>

@endsection

