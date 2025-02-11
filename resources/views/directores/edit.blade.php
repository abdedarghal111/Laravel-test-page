@extends('partials.wrapper')
@section('main')

<div class="row justify-content-center gap-3">
    <div class="card col-md-6">
        <div class="card-header">
            <h4>Editar director</h4>
        </div>
        <div class="card-body">

            <form action="{{ route("directores.update", $director) }}" method="POST">
                @csrf
                @method("PUT")

                @php
                    $prop = ["nombre", "apellidos"]
                @endphp
                @foreach (["Nombre", "Apellidos"] as $i => $campo)
                    <div class="form-group mb-3">
                        <label for="{{$campo}}">{{$campo}}</label>
                        <input type="text" name="{{$campo}}" class="form-control"
                            value="{{old($campo) ? old($campo) : $director[$prop[$i]]}}">
                    </div>

                    @if ($errors->has($campo))
                        <div class="alert alert-danger"> {{ $errors->first($campo) }} </div>
                    @endif
                @endforeach

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Actualizar director</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection