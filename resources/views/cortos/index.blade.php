@extends('partials.wrapper')
@section('main')
    @if (session('status'))
        <div class="row gap-3">
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        </div>
    @endif
    <div class="row gap-3">
        @foreach ($cortos as $corto)
            <div class="card" style="max-width: 25rem;">
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
                    <a href="{{route("cortos.show", $corto)}}" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection