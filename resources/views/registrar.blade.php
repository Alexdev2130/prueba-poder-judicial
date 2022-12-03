@extends('/templates/index');

@section('titulo', 'Registrar usuario')



@section('contenido')

<main class="contenedor">
    <h1>Registrar nuevo usuario</h1>

    <form action="" method="post">
        @csrf
        <div class="campo">
            <label for="nombre">nombre</label>
            <input id="nombre" name="nombre" type="text">
        </div>

        <div class="campo">
            <label for="correo">Email</label>
            <input id="correo" name="correo" type="email">
        </div>

        <div class="campo">
            <label for="clave">clave</label>
            <input id="clave" name="clave" type="password">
        </div>

        <input type="submit" value="ingresar">
    </form>

    @if (!empty($alertas))
        @if (!empty($alertas['correcto']))
            <p class="green">{{$alertas['correcto']}}</p>
        @else
            <p>{{$alertas['error']}}</p>
        @endif
    @endif

    <div class="enlaces">
        <a href="/registrar">Registrarse</a>
        <a href="/">inicio</a>
    </div>
</main>


@endsection
