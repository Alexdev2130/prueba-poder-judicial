<?php

namespace App\Http\Controllers;

use App\Models\authModel;
use Illuminate\Http\Request;

class auth extends Controller
{
    public function auth(Request $request){
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = htmlspecialchars($request->correo);
            $user = authModel::where('correo',"$correo")->first();

            if(isset($user->correo)){
                $password = password_verify($request->clave, $user->clave);
                if($password){

                    $_SESSION['usuario'] = $user->nombre;
                    $_SESSION['correo'] = $user->correo;
                    $_SESSION['idUsuario'] = $user->id;
                    $_SESSION['rol'] = $user->rol;
                    if($user->rol === 'ADM'){
                        return redirect('admin/home');
                    }else{
                        return redirect('/home');
                    }

                }else{
                    $alertas['error'] = 'usuario o clave invalida';
                }
            }else{
                $alertas['error'] = 'usuario o clave invalida';
            }


        }

        return view('auth', [
            'alertas' => $alertas
        ]);
    }

    public function register(Request $request){

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $registrar = new authModel();

            $registrar->nombre = $request->nombre;
            $registrar->correo = $request->correo;

            $password = password_hash($request->clave, PASSWORD_BCRYPT);

            $registrar->clave = $password;
            $registrar->rol = 'CLIENTE';

            if($registrar->save()){
                return redirect('/');
            }else{
                $alertas['error'] = 'Hubo algun error en el registro';
            }
        }

        return view('registrar',[
            'alertas' => $alertas
        ]);
    }


    public function deleteSesion(){
        $_SESSION = [];
        return redirect('/');
    }
}
