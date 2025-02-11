@extends('partials.wrapper')
@section('main')
    @if (session('status'))
        <div class="row gap-3">
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        </div>
    @endif
    <div class="row gap-3">
        @foreach ($directores as $director)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$director["nombre"]}}</h5>
                    <p class="card-subtitle mb-2 text-body-secondary">Apellidos: {{$director["apellidos"]}}</p>
                    <a href="{{route("directores.show", $director)}}" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection