@extends('/templates/index');

@section('titulo', 'Actualizar Producto')



@section('contenido')

<main class="contenedor">
    <h1>Actualizar Producto</h1>

    <form action="" method="post">
        @csrf
        <div class="campo">
            <label for="nombre">Nombre del Producto</label>
            <input id="nombre" name="nombre_producto" type="text" value="{{!empty($request->nombre_producto)? $request->nombre_producto : $producto->nombre}}">
        </div>

        <div class="campo">
            <label for="precio">Precio</label>
            <input id="precio" name="precio" type="number" step="any" value="{{!empty($request->precio)? $request->precio : $producto->precio}}">
        </div>

        <div class="campo">
            <label for="impuesto">Impuesto</label>
            <input id="impuesto" name="impuesto" type="number" step="any" value="{{!empty($request->impuesto)? $request->impuesto : $producto->impuesto}}">
        </div>

        <input type="submit" value="Actualizar Producto">
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
