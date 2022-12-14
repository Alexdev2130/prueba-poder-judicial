@extends('/templates/index')

@section('titulo', 'Iniciar sesion')



@section('contenido')


<main class="contenedor">
    <h1>Autenticacion de Ususario</h1>

    <form action="" method="post">
         @csrf
        <div class="campo">
            <label for="correo">Email</label>
            <input id="correo" name="email" type="email">
        </div>

        <div class="campo">
            <label for="clave">clave</label>
            <input id="clave" name="password" type="password">
        </div>

        <input type="submit" value="ingresar">
    </form>

    @if (!empty($alertas))
        @if (!empty($alertas['correcto']))
            <p class="green">{{$alertas['correcto']}}</p>
        @else
            <p class="red">{{$alertas['error']}}</p>
        @endif
    @endif

    <div class="enlaces">
        <a href="/registrar">Registrarse</a>
        <a href="/">inicio</a>
    </div>
</main>


@endsection
