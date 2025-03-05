@extends('admin.admin');

@section('title', $property -> exists ? "Editer un bien" : "Creer un bien");

@section('content')

    <h1>@yield('title')</h1>

    <form action="{{route ($property-> exists ? 'adminproperty.update' : 'adminproperty.store', $property) }}" method="post">

    @csrf 
    @method($property->exists ? 'PUT' : 'POST')

    @include('shared.input', ['label' => 'Titre', 'name' => 'title', 'value'=>$property->title])

    <div>
        <button class="btn btn-primary">
            @if($property->exists)
                Modifier
            @else
                Créer
            @endif
        </button>
    </div>
    </form>

@endsection