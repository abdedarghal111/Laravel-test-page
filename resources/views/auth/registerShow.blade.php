@extends('partials.wrapper')
@section('main')

<div class="row justify-content-center gap-3">
    <div class="card col-md-8">
        <div class="card-header">
            <h4>Registrarse</h4>
        </div>
        <div class="card-body">
    
            <form action="{{ route("signup.submit") }}" method="POST">
                @csrf
                
                @foreach (["Nombre", "NombreDeUsuario", "Email", "Contraseña", "RepetirContraseña"] as $campo)
                    @if($campo === "NombreDeUsuario")
                        <div class="form-group mb-3">
                            <label for="{{$campo}}">Nombre de usuario</label>
                            <input type="text" name="{{$campo}}" class="form-control" value="{{old($campo)}}">
                        </div>
                    @elseif($campo === "RepetirContraseña")
                        <div class="form-group mb-3">
                            <label for="{{$campo}}">Repetir contraseña</label>
                            <input type="text" name="{{$campo}}" class="form-control" value="{{old($campo)}}">
                        </div>
                    @else
                        <div class="form-group mb-3">
                            <label for="{{$campo}}">{{$campo}}</label>
                            <input type="text" name="{{$campo}}" class="form-control" value="{{old($campo)}}">
                        </div>
                    @endif
    
                    @if ($errors->has($campo))
                        <div class="alert alert-danger"> {{ $errors->first($campo) }} </div>
                    @endif
                @endforeach
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
    
            </form>
    
        </div>
    </div>
</div>

@endsection