@extends('/templates/index')


@section('titulo', 'admin')


@section('contenido')


<main class="contenedor">
<h1>Panel de Administración</h1>
    <div class="enlaces">
        <button id="facturar" class="boton">Generar Facturas pendientes</button>
        <a class="boton" href="/admin/home/productos">Gestionar Productos</a>
        <a class="boton" href="/cerrar-sesion">Cerrar Sesion</a>
    </div>
    <div class="facturas">
        <h2>Facturas</h2>
        <table rules="all">
            <thead>
                <tr>
                    <th>id</th>
                    <th>usuario</th>
                    <th>correo</th>
                    <th>fecha</th>
                    <th>factura</th>
                </tr>
            </thead>

            <tbody id="content">

            </tbody>
        </table>
    </div>






</main>

@csrf
<script src="{{asset('js/facturacion.js')}}"></script>
@endsection
