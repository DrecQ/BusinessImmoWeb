@extends('base')

@section('content')

<x-alert type="success" class="fw-bold" id="test">
  <div class="marquee">
      🏡 Découvrez nos offres exceptionnelles ! Profitez de réductions exclusives sur nos biens immobiliers. Contactez-nous dès maintenant ! 🏡
  </div>
</x-alert>

<style>
  /* Animation du texte */
  .marquee {
      white-space: nowrap; /* Empêche le texte de passer à la ligne */
      overflow: hidden; /* Cache le texte qui dépasse */
      box-sizing: border-box;
      animation: marquee 15s linear infinite; /* Animation */
  }

  /* Définition de l'animation */
  @keyframes marquee {
      0% {
          transform: translateX(100%); /* Départ à droite */
      }
      100% {
          transform: translateX(-100%); /* Arrivée à gauche */
      }
  }
</style>

  <!-- Section Hero -->
  <div class="container-fluid bg-light p-5 mb-4">
    <div class="container p-4 my-3 border rounded bg-white shadow">
      <h2 class="display-4 fw-bold">BusinessImmo Agence</h2>
      <p class="lead"> Découvrez des biens immobiliers exceptionnels, conçus pour répondre à vos besoins et aspirations. Que vous recherchiez un appartement moderne en centre-ville, une maison spacieuse en périphérie ou un investissement locatif rentable, notre agence vous accompagne à chaque étape. Avec des propriétés soigneusement sélectionnées et des conseils personnalisés, nous vous aidons à trouver le logement de vos rêves. Explorez nos offres et laissez-nous vous guider vers votre futur chez-vous. </p>
            <a class="btn btn-primary btn-lg" href="{{ route('property.index') }}">En savoir plus</a>
    </div>
  </div>

  <!-- Section Derniers Biens -->
  <div class="container my-4"> <!-- Réduction des marges avec my-4 -->
    <h2 class="text-center mb-4 fw-bold">Nos derniers biens</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach ($properties as $property)
        <div class="col d-flex align-items-stretch"> <!-- Flexbox pour aligner les cartes -->
          <div class="card h-100 w-100 shadow-sm"> <!-- Ajout de shadow-sm et h-100 pour uniformité -->
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
