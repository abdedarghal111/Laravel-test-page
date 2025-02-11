@extends('partials.wrapper')
@section('main')
    <div class="row gap-3">
    <div class="card w-100">
        <div class="card-body">
            <h5 class="card-title">{{$corto["titulo"]}}</h5>
            <p class="card-subtitle mb-2">
                Director: <a href="{{route("directores.show", $corto["director"])}}">
                    {{$corto["director"]["nombre"]}}
                </a>
            </p>
            <p class="card-text">
                Sinápsis: {{$corto["sinopsis"]}}
            </p>
            <p class="card-text">
                Publicado por: <a href="{{route("user.show", $corto["usuario"])}}">
                    {{$corto["usuario"]["name"]}}
                </a>
            </p>
            <a href="{{route("cortos.edit", $corto)}}" class="btn btn-primary">Editar</a>
            <form class="d-inline" action="{{ route('cortos.destroy', $corto) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Borrar</button>
            </form>
        </div>
    </div>
@endsection