@extends('/templates/index')

@section('titulo', 'Home')



@section('contenido')


<main class="contenedor">
    <h1>Home</h1>
       <div class="enlaces">
         <a class="boton" href="/cerrar-sesion">Cerrar Sesion</a>
       </div>
    <form action="" method="post">
         @csrf

        <div class="campo">
            <label for="productos">Productos</label>
            <select name="producto" id="productos">
                 <option selected disabled value="">Selecciona una Opción</option>
                @foreach ($productos as $producto)
                    <option value="{{$producto->id}}">{{$producto->nombre . ', precio: $'.$producto->precio . ', impuesto: '.$producto->impuesto.'%'}} </option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Comprar">
    </form>

    @if (!empty($alertas))
        @if (!empty($alertas['correcto']))
            <p class="green">{{$alertas['correcto']}}</p>
        @else
            <p class="red">{{$alertas['error']}}</p>
        @endif
    @endif

</main>


@endsection
