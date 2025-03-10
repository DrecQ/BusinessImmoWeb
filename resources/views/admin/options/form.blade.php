@extends('admin.admin')

@section('title', $option->exists ? "Éditer une option" : "Créer une option")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" 
          action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" 
          method="post">

        @csrf 
        @method($option->exists ? 'PUT' : 'POST')

        
            @include('shared.input', ['class' => 'col', 'label' => 'Nom', 'name' => 'name', 'value' => $option->name])
        

        <div>
            <button type="submit" class="btn btn-primary">
                @if($option->exists)
                    Modifier
                @else
                    Creer
                @endif
            </button>
        </div>
    </form>

@endsection

