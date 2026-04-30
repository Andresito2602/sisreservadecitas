<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([RoleSeeder::class,]);

        User::create([
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('admin');



        User::create([
            'name'=>'Secretaria',
            'email'=>'secretaria@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres' => 'Secretaria',
            'apellidos' => '1',
            'cc' => '111111',
            'celular' => '7777777',
            'fecha_nacimiento' => '20/10/2000',
            'direccion' => 'Zona Miraflores calle 5',
            'user_id'=>'2'
        ]);



        User::create([
            'name'=>'Doctor1',
            'email'=>'doctor1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor1',
            'apellidos' => 'Swift',
            'telefono' => '7474757',
            'licencia_medica' => '054527',
            'especialidad' => 'PEDIATRIA',
            'user_id'=>'3'
        ]);

        User::create([
            'name'=>'Doctor2',
            'email'=>'doctor2@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor2',
            'apellidos' => 'Barrientos',
            'telefono' => '7474451',
            'licencia_medica' => '054248',
            'especialidad' => 'ODONTOLOGIA',
            'user_id'=>'4'
        ]);

        User::create([
            'name'=>'Doctor3',
            'email'=>'doctor3@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor3',
            'apellidos' => 'Valdez',
            'telefono' => '74745212',
            'licencia_medica' => '054614',
            'especialidad' => 'FISIOTERAPIA',
            'user_id'=>'5'
        ]);



        Consultorio::create([
            'nombre' => 'PEDIATRIA',
            'ubicacion' => '1-1A',
            'capacidad' => '10',
            'telefono' => '',
            'especialidad' => 'PEDIATRIA',
            'estado' => 'ACTIVO',
        ]);
        Consultorio::create([
            'nombre' => 'ODONTOLOGIA',
            'ubicacion' => '2-1A',
            'capacidad' => '5',
            'telefono' => '851284',
            'especialidad' => 'ODONTOLOGIA',
            'estado' => 'ACTIVO',
        ]);
        Consultorio::create([
            'nombre' => 'FISIOTERAPIA',
            'ubicacion' => '3-1A',
            'capacidad' => '20',
            'telefono' => '17277257',
            'especialidad' => 'FISIOTERAPIA',
            'estado' => 'ACTIVO',
        ]);



        User::create([
            'name'=>'Paciente1',
            'email'=>'paciente1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('paciente');

        User::create([
            'name'=>'Usuario1',
            'email'=>'usuario1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('usuario');

        $this->call([PacienteSeeder::class,]);

        ///////creacion de horarios
        Horario::create([
            'dia'=>'LUNES',
            'hora_inicio'=>'08:00:00',
            'hora_fin'=>'14:00:00',
            'doctor_id'=>'1',
            'consultorio_id'=>'1'
        ]);
    }
}
