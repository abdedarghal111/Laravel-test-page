@extends('partials.wrapper')
@section('main')
    <div class="row gap-3 justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$user["name"]}}</h5>
                <p class="card-subtitle mb-2 text-body-secondary">Email: {{$user["email"]}}</p>
                <a href="{{route("user.edit", $user)}}" class="btn btn-primary">Editar</a>
                <form class="d-inline" action="{{ route('user.destroy', $user) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Borrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection