@extends('base')

@section('title', 'Tous nos biens')

@section('content')
    <!-- Section de recherche -->
    <div class="bg-light p-5 mb-5 shadow-sm rounded">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold">Trouvez votre bien idéal</h2>
            <form action="" method="get" class="row g-3 justify-content-center">
                <div class="col-md-3">
                    <input type="number" class="form-control form-control-lg" placeholder="Surface minimale" name="surface" value="{{ $input['surface'] ?? '' }}">
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control form-control-lg" placeholder="Nombre de pièces min" name="rooms" value="{{ $input['rooms'] ?? '' }}">
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control form-control-lg" placeholder="Budget Max" name="price" value="{{ $input['price'] ?? '' }}">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control form-control-lg" placeholder="Mot clé" name="title" value="{{ $input['title'] ?? '' }}">
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg mt-3">Rechercher</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Section des biens disponibles -->
    <div class="container my-5">
        <h3 class="text-center mb-4 fw-bold">Nos biens disponibles</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($properties as $property)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        @include('property.card')
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-warning text-center py-4">
                        <h4 class="mb-0">Aucun bien ne correspond à vos critères de recherche</h4>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $properties->links() }}
        </div>
    </div>
@endsection