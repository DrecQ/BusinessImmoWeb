@extends('base')


@section('content')
  <div class="container p-4 my-3 border">
    <h2>BusinessImmo Agence</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Cras ultricies ligula sed arcu imperdiet, ac efficitur metus semper. Sed auctor, justo sed consectetur congue, enim purus placerat lectus, non convallis neque tellus at justo. Donec convallis, dolor vel pharetra consectetur, velit nisi ultricies neque, et congue felis lacus sed purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut efficitur ipsum.</p>
    <a class="btn btn-primary" href="#">Learn more</a>
  </div>

  <div class="container">
    <h2>Nos derniers biens</h2>
    <div class="row">
        @foreach ($properties as $property)
        <div class="col">
            @include('property.card')
        </div>
        @endforeach
    </div>
@endsection
