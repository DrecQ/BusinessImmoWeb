<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>    
    <title>@yield('title') | Administration</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Agence</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        @php
            $route = request()->route() ? request()->route()->getName() : '';
        @endphp

      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="{{ route('property.index') }}">Acceuil</a>
        </li>
        <li class="nav-item">
          <a @class(['nav-link', 'active' => str_contains($route, 'property.')]) href="{{ route('admin.property.index')}}">Gérer les biens</a>
        </li>
        <li class="nav-item">
          <a @class(['nav-link', 'active' => str_contains($route, 'option.')])  href="{{ route('admin.option.index')}}">Gérer les options</a>
        </li>
      </ul>

      <div class="ms-auto">
        @auth 
          <ul class="navbar-nav">
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                  @csrf 
                  @method('delete')
                  <button type="submit" class="nav-link btn btn-danger">Se déconnecter</button>
                </form>
            </li>
          </ul>
        @endauth
      </div>

    </div>
  </div>
</nav>
    
    <div class="container mt-5">
        
      @include('shared.flash')

        @yield('content')
    </div>

   
    <script>
        new TomSelect('select[multiple]', {plugins : {remove_button: {title: 'Supprimer'}}});
    </script>
</body>
</html>