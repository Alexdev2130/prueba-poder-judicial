<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class auth extends Controller
{
    public function auth(Request $request){
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            auth()->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);

            if(!auth()->attempt($request->only('email','password'))){
                $alertas['error'] = 'usuario o clave invalida';
            }else{
                if (auth()->user()->rol === 'ADM') {
                    return redirect('/admin/home');
                }else{
                    return redirect('/home');
                }
            };

        }

        return view('auth', [
            'alertas' => $alertas
        ]);
    }

    public function register(Request $request){

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $registrar = new User();

            $registrar->name = $request->nombre;
            $registrar->email = $request->correo;

            $password = password_hash($request->clave, PASSWORD_BCRYPT);

            $registrar->password = $password;
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
        auth()->logout();
        return redirect()->route('login.home');
    }
}
