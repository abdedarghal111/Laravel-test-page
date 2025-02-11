@extends('partials.wrapper')
@section('main')

<div class="row justify-content-center gap-3">
    <div class="card col-md-6">
        <div class="card-header">
            <h4>Editar Corto</h4>
        </div>
        <div class="card-body">

            <form action="{{ route("cortos.update", $corto) }}" method="POST">
                @csrf
                @method("PUT")

                @php
                    $prop = ["titulo", "sinopsis", "director_id", "user_id"]
                @endphp
                @foreach (["Título", "Sinopsis", "directorid", "userid"] as $i => $campo)
                    @if ($campo !== "directorid" || $campo !== "userid")
                        <div class="form-group mb-3">
                            <label for="{{$campo}}">{{$campo}}</label>
                            <input type="text" name="{{$campo}}" class="form-control"
                                value="{{old($campo) ? old($campo) : $corto[$prop[$i]]}}">
                        </div>
                    @elseif ($campo !== "userid")
                        <div class="form-group mb-3">
                            <label for="{{$campo}}">Id del usuario</label>
                            <input type="text" name="{{$campo}}" class="form-control"
                                value="{{old($campo) ? old($campo) : $corto[$prop[$i]]}}">
                        </div>
                    @elseif ($campo !== "directorid")
                        <div class="form-group mb-3">
                            <label for="{{$campo}}">Id del director</label>
                            <input type="text" name="{{$campo}}" class="form-control"
                                value="{{old($campo) ? old($campo) : $corto[$prop[$i]]}}">
                        </div>
                    @endif

                    @if ($errors->has($campo))
                        <div class="alert alert-danger"> {{ $errors->first($campo) }} </div>
                    @endif
                @endforeach

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Actualizar corto</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6 row">
        <div class="card col-6" style="width: fit-content;">
            <div class="card-header">
                <h4>Usuarios</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                    </tr>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario["id"]}}</td>
                            <td>{{$usuario["name"]}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="card col-6" style="width: fit-content;">
            <div class="card-header">
                <h4>Directores</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                    </tr>
                    @foreach ($directores as $director)
                        <tr>
                            <td>{{$director["id"]}}</td>
                            <td>{{$director["nombre"]}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection