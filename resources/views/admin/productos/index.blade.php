@extends('/templates/index')


@section('titulo', 'productos')


@section('contenido')


<main class="contenedor">
<h1>Panel de Administración</h1>
    <div class="enlaces">
        <a class="boton" href="/admin/home">regresar</a>
        <a class="boton" href="/admin/home/productos/create">Nuevo Producto</a>
    </div>
    <div class="facturas">
        <h2>Productos</h2>
        <table rules="all">
            <thead>
                <tr>
                    <th>id</th>
                    <th>producto</th>
                    <th>precio</th>
                    <th>impuesto</th>
                    <th>acciones</th>
                </tr>
            </thead>

            <tbody>
              @foreach ($productos as  $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>${{$producto->precio}}</td>
                    <td>{{$producto->impuesto}}%</td>
                    <td class="acciones">
                        <a href="/admin/home/productos/update?ID={{$producto->id}}">Actualizar</a>
                        <a href="/admin/home/productos/delete?ID={{$producto->id}}">eliminar</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>






</main>
