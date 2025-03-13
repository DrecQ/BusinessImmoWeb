@extends('base')

@section('title', 'Tous nos biens')

@section('content')

    <div class="bg-light p-5 text-center mb-4 shadow-sm rounded">
        <h2 class="mb-4">Trouvez votre bien idéal</h2>
        <form action="" method="get" class="container d-flex gap-3 justify-content-center">
            <div class="d-flex gap-2">
                <input type="number" placeholder="Surface minimale" class="form-control" name="surface" value="{{ $input['surface'] ?? '' }}">
                <input type="number" placeholder="Nombre de pièces min" class="form-control" name="rooms" value="{{ $input['rooms'] ?? '' }}">
                <input type="number" placeholder="Budget Max" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
                <input placeholder="Mot clé" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
            </div>
            <button class="btn btn-primary btn-lg ms-2" type="submit">Rechercher</button>
        </form>
    </div>

    <div class="container mt-5">
        <h3 class="mb-4 text-center">Nos biens disponibles</h3>
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="card shadow-sm">
                        @include('property.card')
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-warning text-center">
                        <h4>Aucun bien ne correspond à vos critères de recherche</h4>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center my-4">
            {{ $properties->links() }}
        </div>
    </div>

@endsection
