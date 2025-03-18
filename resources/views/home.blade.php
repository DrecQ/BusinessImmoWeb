@extends('base')

@section('content')

  <x-alert type="success" class="fw-bold" id="test">
    Des informations 
  </x-alert>

  <!-- Section Hero -->
  <div class="container-fluid bg-light p-5 mb-4">
    <div class="container p-4 my-3 border rounded bg-white shadow">
      <h2 class="display-4 fw-bold">BusinessImmo Agence</h2>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Cras ultricies ligula sed arcu imperdiet, ac efficitur metus semper. Sed auctor, justo sed consectetur congue, enim purus placerat lectus, non convallis neque tellus at justo. Donec convallis, dolor vel pharetra consectetur, velit nisi ultricies neque, et congue felis lacus sed purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut efficitur ipsum.</p>
      <a class="btn btn-primary btn-lg" href="#">En savoir plus</a>
    </div>
  </div>

  <!-- Section Derniers Biens -->
  <div class="container my-4"> <!-- Réduction des marges avec my-4 -->
    <h2 class="text-center mb-4 fw-bold">Nos derniers biens</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach ($properties as $property)
        <div class="col d-flex align-items-stretch"> <!-- Flexbox pour aligner les cartes -->
          <div class="card h-100 shadow-sm"> <!-- Ajout de shadow-sm et h-100 pour uniformité -->
            @include('property.card')
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Footer -->
<footer class="bg-light py-4 mt-5 border-top">
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
