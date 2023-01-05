<?php

namespace App\Http\Controllers;

use App\Models\Compras as ModelsCompras;
use App\Models\Productos;
use Illuminate\Http\Request;

class compras extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }



    public function index(Request $request){
        $productos = Productos::all();
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $compra = new ModelsCompras();

            $compra->idCliente = auth()->user()->id;
            $compra->idProducto = $request->producto;
            $compra->estado = 'SIN FACTURAR';

            if($compra->save()){
                return redirect('/home');
            }else{
                $alertas['error'] = 'hubo algun problema con tu compra';
            }
        }

        return view('home', [
            'productos' => $productos
        ]);
    }
}
