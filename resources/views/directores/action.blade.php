@extends('partials.wrapper')
@section('main')

<div class="row justify-content-center gap-3">
    <div class="col-md-6">

        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Elige que quieres realizar con los directores.</h4>
                <p>Actualmente existen {{$objectsNumber}} registros.</p>
            </div>
            <div class="card-body">
                <ul>
                    @if(hasRol("editor", "admin"))
                        <li><a href="{{route("directores.index")}}">
                                Ver, editar o borrar
                        </a></li>
                        <li><a href="{{route("directores.create")}}">
                                Agregar
                        </a></li>
                    @else
                        <li><a href="{{route("directores.index")}}">
                                Ver
                        </a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection