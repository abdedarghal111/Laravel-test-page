@extends('partials.wrapper')
@section('main')

<div class="row justify-content-center gap-3">
    <div class="card col-md-8">
        <div class="card-header">
            <h4>Iniciar sesión</h4>
        </div>
        <div class="card-body">

            <form action="{{ route("login.submit") }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="UserOrEmail">Nombre de usuario o email</label>
                    <input type="text" name="UserOrEmail" class="form-control" value="{{old("UserOrEmail")}}">
                </div>
                @if ($errors->has("UserOrEmail"))
                    <div class="alert alert-danger"> {{ $errors->first("UserOrEmail") }} </div>
                @endif

                <div class="form-group mb-3">
                    <label for="Contraseña">Constraseña</label>
                    <input type="text" name="Contraseña" class="form-control" value="{{old("Contraseña")}}">
                </div>
                @if ($errors->has("Contraseña"))
                    <div class="alert alert-danger"> {{ $errors->first("Contraseña") }} </div>
                @endif

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection