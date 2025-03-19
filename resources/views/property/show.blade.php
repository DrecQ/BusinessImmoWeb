@extends('base')

@section('title', $property->title)

@section('content')
<div class="container mt-5">
    <!-- Section Image et Informations principales -->
    <div class="row align-items-center mb-5">
        <!-- Image du bien -->
        <div class="col-md-5">
            @if($property->image)
                <img src="{{ $property->imageUrl() }}" alt="{{ $property->title }}" class="img-fluid rounded shadow-lg" style="height: 400px; object-fit: cover; width: 100%;">
            @endif
        </div>

        <!-- Informations principales -->
        <div class="col-md-7">
            <h1 class="display-5 text-primary fw-bold">{{ $property->title }}</h1>
            <h4 class="text-muted">{{ $property->rooms }} pièces - {{ $property->surface }} m² - {{ $property->address }}</h4>
            <div class="text-primary fw-bold mt-3" style="font-size: 2.5rem;">
                {{ number_format($property->price, thousands_separator: ' ') }} XOF
            </div>
        </div>
    </div>

    <hr class="my-4">

    <!-- Formulaire de contact -->
    <div class="bg-light p-4 rounded shadow-sm">
        <h4 class="text-center mb-4 fw-bold">{{ __('property.contact_title')}}</h4>

        @include('shared.flash')

        <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    @include('shared.input', ['class' => 'form-control', 'label' => 'Prénoms', 'name' => 'firstname', 'placeholder' => 'Votre prénom'])
                </div>
                <div class="col-md-6">
                    @include('shared.input', ['class' => 'form-control', 'label' => 'Nom', 'name' => 'lastname', 'placeholder' => 'Votre nom'])
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    @include('shared.input', ['class' => 'form-control', 'label' => 'Téléphone', 'name' => 'phone'])
                </div>
                <div class="col-md-6">
                    @include('shared.input', ['class' => 'form-control', 'type' => 'email', 'label' => 'Email', 'name' => 'email'])
                </div>
            </div>
            <div class="col-12">
                @include('shared.input', ['class' => 'form-control', 'type' => 'textarea', 'label' => 'Votre message', 'name' => 'message'])
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary w-50 btn-lg">Nous contacter</button>
            </div>
        </form>
    </div>

    <hr class="my-5">

    <!-- Description et caractéristiques -->
    <div class="mt-5">
        <h4 class="fw-bold mb-4">Description</h4>
        <p class="lead">{!! nl2br(e($property->description)) !!}</p>

        <div class="row mt-4">
            <!-- Caractéristiques -->
            <div class="col-md-8">
                <h4 class="fw-bold mb-4">Caractéristiques</h4>
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
                            <td>{{ $property->address }}<br>{{ $property->city }} ({{ $property->postal_code }})</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Spécificités -->
            <div class="col-md-4">
                <h4 class="fw-bold mb-4">Spécificités</h4>
                <ul class="list-group">
                    @foreach($property->options as $option)
                        <li class="list-group-item">{{ $option->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-light py-4 mt-4 border-top">
    <div class="container">
        <div class="row text-center text-md-start">
            <!-- Section Liens rapides -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold mb-3">Liens rapides</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-decoration-none text-dark">Accueil</a></li>
                    <li><a href="#" class="text-decoration-none text-dark">Nos biens</a></li>
                </ul>
            </div>

            <!-- Section Contact -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold mb-3">Contact</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt me-2"></i>xxxxxxx , Cotonou</li>
                    <li><i class="fas fa-phone me-2"></i>+229 01 xx xx xx xx</li>
                    <li><i class="fas fa-envelope me-2"></i>contact@businessimmo.com</li>
                </ul>
            </div>

            <!-- Section Réseaux sociaux -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold mb-3">Suivez-nous</h5>
                <div class="d-flex gap-3 justify-content-center justify-content-md-start">
                    <a href="#" class="text-dark"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#" class="text-dark"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#" class="text-dark"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="#" class="text-dark"><i class="fab fa-linkedin fa-2x"></i></a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-4">
            <p class="mb-0">&copy; 2023 BusinessImmo Agence. Tous droits réservés.</p>
        </div>
    </div>
</footer>
@endsection