@extends('base')


@section('title', 'Se connecter')

@section('content')
    
    <div class="container mt-4">
        <h1>@yield('title')</h1>

        @include('shared.flash')
        <form action="{{ route('login') }}" method="post" class="vstack gap-3">
            @csrf 
            @include('shared.input', ['class' => 'col', 'type' => 'email', 'label' => 'Email', 'name' => 'email'])
            @include('shared.input', ['class' => 'col', 'type' => 'password', 'label' => 'Password', 'name' => 'password'])

            <div>
                <button type="submit" class="btn btn-primary">Se connecter</button>                
            </div>
            <div>
                <a href="{{ route('google.login') }}" class="btn btn-warning">Connexion avec Google</a>
            </div>

        </form>
    </div>

@endsection