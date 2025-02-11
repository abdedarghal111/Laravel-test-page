<header class="w-100 d-flex justify-content-start m-3 gap-4">
    <h1 class="m-0 h4">FestiCortos</h1>
    <nav class="d-flex gap-5 align-items-center">
        <a class="{{setHeaderActive("home")}}" href="{{route('home')}}">Home</a>
        <a class="{{setHeaderActive("user.action")}}" href="{{route('user.action')}}">Usuarios</a>
        <a class="{{setHeaderActive("directores.action")}}" href="{{route('directores.action')}}">Directores</a>
        <a class="{{setHeaderActive("cortos.action")}}" href="{{route('cortos.action')}}">Cortos</a>
    </nav>
</header>