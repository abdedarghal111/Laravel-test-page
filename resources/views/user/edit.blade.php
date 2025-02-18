@extends('partials.wrapper')
@section('main')

<div class="row justify-content-center gap-3">
    <div class="card col-md-6">
        <div class="card-header">
            <h4>Editar Usuario</h4>
        </div>
        <div class="card-body">

            <form action="{{ route("user.update", $user) }}" method="POST">
                @csrf
                @method("PUT")

                @php
                    $prop = ["name", "username", "email", "", ""]
                @endphp
                @foreach (["Nombre", "NombreDeUsuario", "Email", "Contraseña", "RepetirContraseña"] as $i => $campo)
                    @if($campo === "NombreDeUsuario")
                        <div class="form-group mb-3">
                            <label for="{{$campo}}">Nombre de usuario</label>
                            <input type="text" name="{{$campo}}" class="form-control" value="{{old($campo) ? old($campo) : $user[$prop[$i]]}}">
                        </div>
                    @elseif($campo === "RepetirContraseña")
                        <div class="form-group mb-3">
                            <label for="{{$campo}}">Repetir contraseña</label>
                            <input type="text" name="{{$campo}}" class="form-control" value="{{old($campo)}}">
                        </div>
                    @else
                        <div class="form-group mb-3">
                            <label for="{{$campo}}">{{$campo}}</label>
                            <input type="text" name="{{$campo}}" class="form-control"
                                value="{{old($campo) ? old($campo) : $user[$prop[$i]]}}">
                        </div>
                    @endif

                    @if ($errors->has($campo))
                        <div class="alert alert-danger"> {{ $errors->first($campo) }} </div>
                    @endif
                @endforeach

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection