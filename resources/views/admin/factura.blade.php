@extends('templates.index')

@section('titulo', 'desglose de factura')

@section('contenido')


<main class="contenedor center">
<h1>Panel de Administración</h1>
      <a class="boton" href="/admin/home">regresar</a>
    <div class="facturas">
        <h2>Factura</h2>

        <table rules="all">
            <thead>
                <tr>
                    <th>usuario</th>
                    <th>monto total</th>
                    <th>impuesto total</th>
                </tr>
            </thead>

            <tbody>
                 <tr>
                    <td>{{$factura->cliente}}</td>
                    <td>${{$factura->monto_total}}</td>
                    <td>{{$factura->impuesto_total}}%</td>
                </tr>
            </tbody>
        </table>
    </div>



    <table rules="all">
        <thead>
            <tr>
                <th>nombre del producto</th>
                <th>precio</th>
                <th>impuesto </th>
            </tr>
        </thead>

        <tbody>
           @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->nombre}}</td>
                    <td>${{$producto->precio}}</td>
                    <td>{{$producto->impuesto}}%</td>
                </tr>
           @endforeach
        </tbody>
    </table>


</main>
