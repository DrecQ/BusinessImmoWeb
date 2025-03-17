@extends('base')

@section('title', 'Se connecter')

@section('content')
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h1 class="card-title text-center mb-4">@yield('title')</h1>

                        @include('shared.flash')

                        <form action="{{ route('login') }}" method="post" class="vstack gap-3">
                            @csrf 

                            <!-- Email Input -->
                            <div class="mb-2">
                                @include('shared.input', [
                                    'class' => 'form-control',
                                    'type' => 'email',
                                    'label' => 'Email',
                                    'name' => 'email',
                                ])
                            </div>

                            <!-- Password Input -->
                            <div class="mb-2">
                                @include('shared.input', [
                                    'class' => 'form-control',
                                    'type' => 'password',
                                    'label' => 'Mot de passe',
                                    'name' => 'password',
                                ])
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-1">
                                <button type="submit" class="btn btn-primary btn-lg">Se connecter</button>
                            </div>

                            {{-- <!-- Google Login Button -->
                            <div class="d-grid mb-2">
                                <a href="{{ route('google.login') }}" class="btn btn-warning btn-lg">
                                    <i class="fab fa-google me-2"></i> Connexion avec Google
                                </a>
                            </div> --}}

                            <!-- Forgot Password Link -->
                            <div class="text-center">
                                <a href="" class="text-decoration-none">Mot de passe oublié ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection