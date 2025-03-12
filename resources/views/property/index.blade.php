@extends('base')


@section('title', 'Tous nos biens')


@section('content')

    <div class="bg-light p-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="Surface minimale" class="form-control" name="surface" id="" value="{{ $input['surface'] ?? ''}}">
            <input type="number" placeholder="Nombres de pièces min" class="form-control" name="rooms" id="" value="{{ $input['rooms'] ?? ''}}">
            <input type="number" placeholder="Budget Max" class="form-control" name="price" id="" value="{{ $input['price'] ?? ''}}">
            <input placeholder="Mot clef" class="form-control" name="title" id="" value="{{ $input['title'] ?? ''}}">

            <button class="btn btn-primary btn-sm flex-grow-0" type="submit"> Rechercher </button>
        </form>
    </div>

    <div class="container mt-3">
        <div class="row">
            @foreach ($properties as $property)
            <div class="col-3 mb-4">
                @include('property.card')
            </div>
        @endforeach

        <div class="my-4">
            {{ $properties->links()}}
        </div>
    </div>

  
@endsection