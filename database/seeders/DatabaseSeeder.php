<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Productos;
use App\Models\User;
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

        $admin = new User();
        $admin->name = 'alejandro';
        $admin->email = 'admin@sistema.com';
        $admin->password = password_hash('123456', PASSWORD_BCRYPT);
        $admin->rol = 'ADM';
        $admin->save();

        $cliente1 = new User();
        $cliente1->name = 'pedro';
        $cliente1->email = 'cliente1@sistema.com';
        $cliente1->password = password_hash('123456', PASSWORD_BCRYPT);
        $cliente1->rol = 'CLIENTE';
        $cliente1->save();


        $cliente2 = new User();
        $cliente2->name = 'juan';
        $cliente2->email = 'cliente2@sistema.com';
        $cliente2->password = password_hash('123456', PASSWORD_BCRYPT);
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
