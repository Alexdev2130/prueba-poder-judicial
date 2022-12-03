@extends('/templates/index');

@section('titulo', 'Registrar Producto')



@section('contenido')

<main class="contenedor">
    <h1>Registrar nuevo Producto</h1>

    <form action="" method="post">
        @csrf
        <div class="campo">
            <label for="nombre">Nombre del Producto</label>
            <input id="nombre" name="nombre_producto" type="text">
        </div>

        <div class="campo">
            <label for="precio">Precio</label>
            <input id="precio" name="precio" type="number" step="any">
        </div>

        <div class="campo">
            <label for="impuesto">Impuesto</label>
            <input id="impuesto" name="impuesto" type="number" step="any">
        </div>

        <input type="submit" value="Crear Producto">
    </form>

    @if (!empty($alertas))
        @if (!empty($alertas['correcto']))
            <p class="green">{{$alertas['correcto']}}</p>
        @else
            <p>{{$alertas['error']}}</p>
        @endif
    @endif

    <div class="enlaces">
        <a class="boton" href="/admin/home">regresar</a>
    </div>
</main>


@endsection
