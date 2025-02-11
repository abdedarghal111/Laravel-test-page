@extends('partials.wrapper')
@section('main')
    <div class="row gap-3 justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$director["nombre"]}}</h5>
                <p class="card-subtitle mb-2 text-body-secondary">Apellidos: {{$director["apellidos"]}}</p>
                <a href="{{route("directores.edit", $director)}}" class="btn btn-primary">Editar</a>
                <form class="d-inline" action="{{ route('directores.destroy', $director) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Borrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection