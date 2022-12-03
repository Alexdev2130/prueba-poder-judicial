<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\authModel;
use App\Models\Productos;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin = new authModel();
        $admin->nombre = 'alejandro';
        $admin->correo = 'admin@sistema.com';
        $admin->clave = '$2y$10$DX6WUdMhHNFRFF7tbI4Ms.z4zumgZQU8SGGGVWy0T0BL3QZ0v3Vou';
        $admin->rol = 'ADM';
        $admin->save();

        $cliente1 = new authModel();
        $cliente1->nombre = 'pedro';
        $cliente1->correo = 'cliente1@sistema.com';
        $cliente1->clave = '$2y$10$KYZYHZ3kxyoYImhmQ3vIYuijtuSXar3UW7wfcxsUKLMAw3WFEDkY2';
        $cliente1->rol = 'CLIENTE';
        $cliente1->save();


        $cliente2 = new authModel();
        $cliente2->nombre = 'juan';
        $cliente2->correo = 'cliente2@sistema.com';
        $cliente2->clave = '$2y$10$KYZYHZ3kxyoYImhmQ3vIYuijtuSXar3UW7wfcxsUKLMAw3WFEDkY2';
        $cliente2->rol = 'CLIENTE';
        $cliente2->save();


        $producto1 = new Productos();
        $producto1->nombre = 'harina';
        $producto1->precio = 3.4;
        $producto1->impuesto = 0.4;
        $producto1->save();

        $producto1 = new Productos();
        $producto1->nombre = 'arroz';
        $producto1->precio = 1.5;
        $producto1->impuesto = 0.7;
        $producto1->save();

        $producto1 = new Productos();
        $producto1->nombre = 'pasta';
        $producto1->precio = 2.8;
        $producto1->impuesto = 1;
        $producto1->save();

        $producto1 = new Productos();
        $producto1->nombre = 'huevos';
        $producto1->precio = 5;
        $producto1->impuesto = 1.2;
        $producto1->save();

        $producto1 = new Productos();
        $producto1->nombre = 'pan';
        $producto1->precio = 1.6;
        $producto1->impuesto = 0.2;
        $producto1->save();
    }
}
