@extends('partials.wrapper')
@section('main')
    @if (session('status'))
        <div class="row gap-3">
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        </div>
    @endif
    <div class="row gap-3">
        @foreach ($users as $user)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$user["name"]}}</h5>
                    <p class="card-subtitle mb-2 text-body-secondary">Email: {{$user["email"]}}</p>
                    <a href="{{route("user.show", $user)}}" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection