<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Facturas;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;

use function GuzzleHttp\json_encode;

class admin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rol');
    }


    public function index(Request $request){

        return view('admin.index');
    }

    public function productos(Request $request){


        $productos = Productos::all();

        return view('admin.productos.index', [
            'productos' => $productos
        ]);
    }


    public function createProductos(Request $request){

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $producto = new Productos();

            $producto->nombre = $request->nombre_producto;
            $producto->precio = $request->precio;
            $producto->impuesto = $request->impuesto;
            if($producto->save()){
                return redirect('/admin/home/productos');
            }else{
                $alertas['error'] = 'ocurrió algún error al intentar registrar el producto';
            }
        }

        return view('admin.productos.create', [
            'alertas' => $alertas
        ]);
    }


    public function updateProductos(Request $request)
    {

        $id = htmlspecialchars($_GET['ID']);
        $producto = Productos::find($id);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){


            $producto->nombre = $request->nombre_producto;
            $producto->precio = $request->precio;
            $producto->impuesto = $request->impuesto;
            if ($producto->save()) {
                return redirect('/admin/home/productos');
            } else {
                $alertas['error'] = 'ocurrió algún error al intentar actualizar el producto';
            }
        }

        return view('admin.productos.update', [
            'producto' => $producto,
            'request' => $request
        ]);
    }

    public function deleteProductos()
    {

        $id = htmlspecialchars($_GET['ID']);
        $producto = Productos::find($id);
        $producto->delete();
        return redirect('/admin/home/productos');
    }




    public function facturas(Request $request)
    {
       if($request->orden = 'FACTURAR'){

            $compras = DB::select("SELECT users.id AS idUsuario,users.name,
            users.email,
            compras.created_at AS fecha_compra,
            productos.nombre AS producto, productos.precio,
            productos.impuesto,
            estado
            FROM productos
            RIGHT JOIN compras ON compras.idProducto = productos.id
            LEFT JOIN users ON compras.idCliente = users.id
            WHERE compras.estado= 'SIN FACTURAR'
            ");

            if (!empty($compras)) {
                $grupos = array();

                foreach ($compras as $compra) {
                    $grupos[$compra->idUsuario][] = $compra;
                }

                $users = [];
                $productos = [];
                foreach ($grupos as $key => $value) {

                    foreach ($value as $key2 => $value) {

                        $fechas[$value->idUsuario][] = $value->fecha_compra;

                        $productos[$value->idUsuario][] = array(
                            'nombre' => $value->producto,
                            'precio' => $value->precio,
                            'impuesto' => $value->impuesto,
                            'fecha_compra' => $value->fecha_compra
                        );

                        $users[$value->idUsuario] = array(
                            'idUsuario' => $value->idUsuario,
                            'nombre' => $value->name,
                            'correo' => $value->email,
                            'productos' => $productos[$value->idUsuario]
                        );
                    }
                }




                foreach ($users as $key => $value) {
                    $factura = new Facturas();
                    $factura->cliente = $value['nombre'] . ' ' . $value['correo'];

                    //PRECIO TOTAL E IMPUESTO TOTAL
                    $monto = 0;
                    $impuesto = 0;
                    foreach ($value['productos'] as $producto) {
                        $impuesto_total = $impuesto += $producto['impuesto'];
                        $monto_SINImpuesto =  $monto += $producto['precio'];
                        $monto_total = $monto_SINImpuesto  * ($impuesto_total / 100) + $monto_SINImpuesto;
                    }

                    $factura->monto_total = $monto_total;
                    $factura->impuesto_total = $impuesto_total;
                    $factura->productos = \json_encode($value['productos']);
                    $status = $factura->save();
                }


                if ($status) {
                    $facturado = compras::all()->where('estado', 'SIN FACTURAR');
                    foreach ($facturado as $reg) {
                        $reg->estado = 'FACTURADO';
                        $reg->save();
                    }
                    echo \json_encode([
                        'STATUS' => 'OK'
                    ]);
                } else {
                    echo \json_encode([
                        'STATUS' => 'ERROR'
                    ]);
                }
            } else {
                echo \json_encode([
                    'STATUS' => 'DATOS FACTURADOS'
                ]);
            }
        }

    }

    public function getFacturas(){

        $facturas = Facturas::all();

        echo \json_encode($facturas);
    }

    public function viewFactura(){

        $id = htmlspecialchars($_GET['id']);
        $factura = Facturas::find($id);
        $productos = json_decode($factura->productos);

        return view('admin.factura', [
            'factura' => $factura,
            'productos' => $productos
        ]);
    }
}
