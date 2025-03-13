{{-- @extends('base')


@section('title', $property->title)


@section('content')

<div class="container mt-4">
        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m² - à {{ $property->address }}</h2>

        <div class="text-primary fw-bold" style="font-size : 4rem">
            {{ number_format($property->price, thousands_separator: ' ') }} XOF
        </div>

        <hr>

        
        <div class="mt-4">
            <h4>Intéressé par ce bien ?</h4>

            <form action="" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', ['class' => 'col', 'label' => 'Prenoms', 'name' => 'firstname'])
                    @include('shared.input', ['class' => 'col', 'label' => 'Nom', 'name' => 'lastname'])
                </div>
                <div class="row">
                    @include('shared.input', ['class' => 'col','label' => 'Telephone', 'name' => 'phone'])
                    @include('shared.input', ['class' => 'col','type' => 'email' , 'label' => 'Email', 'name' => 'email'])
                </div>
                    @include('shared.input', ['class' => 'col','type' => 'textarea' , 'label' => 'Votre message', 'name' => 'message'])
            </form>


            <div>
                <button type="submit" class="btn btn-primary mt-2 pt-2">Nous contacter</button>
            </div>
        </div>

        <div class="mt-4">
            <p> {{!! nl2br($property->description) !!}}</p>

            <div class="row">
                <div class="col-8">
                    <h2>Caractéristiques</h2>
                    <table class="table table-stripped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Salle de bain</td>
                            <td>{{ $property->bathrooms }}</td>
                        </tr>
                        <tr>
                            <td>Étage</td>
                            <td>{{ $property->floor ?: 'Rez de chaussée' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{ $property->address }} <br>
                                {{ $property->city }} ({{ $property->postal_code }})
                            </td>
                        </tr>
                   
                        <tr>
                    </table>
                </div>

                <div class="col-4">
                    <h2>Spécifités</h2>
                    <ul class="list-group">
                        @foreach($property->option as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection --}}



@extends('base')

@section('title', $property->title)

@section('content')

<div class="container mt-5">
    <!-- Titre du bien et informations principales -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary">{{ $property->title }}</h1>
        <h3 class="text-muted">{{ $property->rooms }} pièces - {{ $property->surface }} m² - à {{ $property->address }}</h3>
        <div class="text-primary fw-bold" style="font-size: 3rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} XOF
        </div>
    </div>

    <hr class="my-4">

    <!-- Formulaire de contact -->
    <div class="mt-5">
        <h4 class="text-center mb-4">Intéressé par ce bien ?</h4>

        @include('shared.flash')

        <form action=" {{ route('property.contact', $property)}}" method="post" class="vstack gap-4">
            @csrf
            <div class="row g-3">
                @include('shared.input', ['class' => 'col-md-6', 'label' => 'Prénoms', 'name' => 'firstname'])
                @include('shared.input', ['class' => 'col-md-6', 'label' => 'Nom', 'name' => 'lastname'])
            </div>
            <div class="row g-3">
                @include('shared.input', ['class' => 'col-md-6', 'label' => 'Téléphone', 'name' => 'phone', ])
                @include('shared.input', ['class' => 'col-md-6', 'type' => 'email', 'label' => 'Email', 'name' => 'email'])
            </div>
            @include('shared.input', ['class' => 'col-12', 'type' => 'textarea', 'label' => 'Votre message', 'name' => 'message'])
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg mt-3">Nous contacter</button>
            </div>
        </form>
    </div>

    <hr class="my-5">

    <!-- Description et caractéristiques -->
    <div class="mt-4">
        <h4>Description</h4>
        <p>{!! nl2br(e($property->description)) !!}</p>

        <div class="row">
            <!-- Caractéristiques -->
            <div class="col-md-8">
                <h4>Caractéristiques</h4>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Salle de bain</td>
                            <td>{{ $property->bathrooms }}</td>
                        </tr>
                        <tr>
                            <td>Étage</td>
                            <td>{{ $property->floor ?: 'Rez-de-chaussée' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>{{ $property->address }}<br> {{ $property->city }} ({{ $property->postal_code }})</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Spécifications -->
            <div class="col-md-4">
                <h4>Spécificités</h4>
                <ul class="list-group">
                    @foreach($property->option as $option)
                        <li class="list-group-item">{{ $option->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
