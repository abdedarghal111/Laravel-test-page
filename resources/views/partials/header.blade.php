<header class="w-100 d-flex justify-content-between p-4 gap-4">
    <h1 class="m-0 h4">FestiCortos</h1>
    <nav class="d-flex gap-5 align-items-center">
        <a class="{{setHeaderActive("home")}}" href="{{route('home')}}">Home</a>
        <a class="{{setHeaderActive("cortos*")}}" href="{{route('cortos.action')}}">Cortos</a>
        @if(isLogged())
            <a class="{{setHeaderActive("directores*")}}" href="{{route('directores.action')}}">Directores</a>
            
            @if(hasRol("editor", "admin"))
                <a class="{{setHeaderActive("user*")}}" href="{{route('user.action')}}">Usuarios</a>
            @endif
        @endif


        @if(isLogged())
            <a class="{{setHeaderActive("signout*")}}" href="{{route('signout.submit')}}">Cerrar sesión</a>
        @else
            <a class="{{setHeaderActive("login*")}}" href="{{route('login.show')}}">Iniciar sesión</a>
            <a class="{{setHeaderActive("signup*")}}" href="{{route('signup.show')}}">Registrarse</a>
        @endif
    </nav>
    <span>
    @if(isLogged())
        Bienvenido {{ auth()->user()->username }}({{ auth()->user()->rol }})
    @else
        Usuario no identificado    
    @endif
    </span>
</header>