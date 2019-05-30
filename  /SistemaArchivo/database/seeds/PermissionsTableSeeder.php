<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//users
        Permission::create([
        	'name' 			=> 'Navegar Usuarios',
        	'slug' 			=> 'users.index',
        	'description'   => 'Lista y Navega todos los usuarios del sistema',
        ]);

        Permission::create([
        	'name' 			=> 'Crear Usuario',
        	'slug' 			=> 'register',
        	'description'   => 'Registra un usuario del sistema',
        ]);

         Permission::create([
        	'name' 			=> 'Ver detalle Usuario',
        	'slug' 			=> 'users.edit',
        	'description'   => 'Editar dar role a cada usuario del sistema',
        ]); 

          Permission::create([
            'name'          => 'Actualizar contraseña',
            'slug'          => 'users.reset',
            'description'   => 'Actualizar la contraseña de los usuarios',
        ]); 

         //Roles

          Permission::create([
        	'name' 			=> 'Navegar Roles',
        	'slug' 			=> 'roles.index',
        	'description'   => 'Lista y Navega todos los roles del sistema',
        ]);

        Permission::create([
        	'name' 			=> 'Crear Roles',
        	'slug' 			=> 'roles.create',
        	'description'   => 'Crear un rol del sistema',
        ]);

         Permission::create([
        	'name' 			=> 'Ver detalle de Roles',
        	'slug' 			=> 'roles.show',
        	'description'   => 'Ver en detalle cada rol del sistema',
        ]);

         Permission::create([
        	'name' 			=> 'Edición de Roles',
        	'slug' 			=> 'roles.edit',
        	'description'   => 'Editar cualquier dato de un rol del sistema',
        ]);

          Permission::create([
        	'name' 			=> 'Eliminar Roles',
        	'slug' 			=> 'roles.destroy',
        	'description'   => 'Editar cualquier dato de un rol del sistema',
        ]);

          //Carreras

          Permission::create([
        	'name' 			=> 'Navegar Carreras',
        	'slug' 			=> 'carreras.index',
        	'description'   => 'Lista y Navega todos los roles del sistema',
        ]);

        Permission::create([
        	'name' 			=> 'Crear Carreras',
        	'slug' 			=> 'carreras.create',
        	'description'   => 'Crear un carrera del sistema',
        ]);

         Permission::create([
        	'name' 			=> 'Ver detalle de Carreras',
        	'slug' 			=> 'carreras.show',
        	'description'   => 'Ver en detalle cada carrera del sistema',
        ]);

         Permission::create([
        	'name' 			=> 'Edición de Carreras',
        	'slug' 			=> 'carreras.edit',
        	'description'   => 'Editar cualquier dato de un carrera del sistema',
        ]);

          Permission::create([
        	'name' 			=> 'Eliminar Carreras',
        	'slug' 			=> 'carreras.destroy',
        	'description'   => 'Editar cualquier dato de un carrera del sistema',
        ]);

        //Archivos

          Permission::create([
            'name'          => 'Navegar Archivos',
            'slug'          => 'archivos.index',
            'description'   => 'Lista y Navega todos los roles del sistema',
        ]);

        Permission::create([
            'name'          => 'Crear Archivos',
            'slug'          => 'archivos.store',
            'description'   => 'Crear un archivo del sistema',
        ]);

         Permission::create([
            'name'          => 'Edición de Archivo',
            'slug'          => 'archivos.update',
            'description'   => 'Editar cualquier dato de un archivo del sistema',
        ]);

          Permission::create([
            'name'          => 'Eliminar Archivo',
            'slug'          => 'archivos.destroy',
            'description'   => 'Editar cualquier dato de un archivo del sistema',
        ]);

         Permission::create([
            'name'          => 'Ver detalle de Archivo',
            'slug'          => 'archivos.show',
            'description'   => 'Ver en detalle cada archivo del sistema',
        ]);


        //Gavetas

          Permission::create([
            'name'          => 'Navegar Gavetas',
            'slug'          => 'gavetas.index',
            'description'   => 'Lista y Navega todos los gavetas del sistema',
        ]);

        Permission::create([
            'name'          => 'Crear Gavetas',
            'slug'          => 'gavetas.store',
            'description'   => 'Crear una gaveta en el sistema',
        ]);

         Permission::create([
            'name'          => 'Edición de Gaveta',
            'slug'          => 'gavetas.update',
            'description'   => 'Editar cualquier dato de una gaveta en el sistema',
        ]);

          Permission::create([
            'name'          => 'Eliminar Gaveta',
            'slug'          => 'gavetas.destroy',
            'description'   => 'Editar cualquier dato de una gaveta en el sistema',
        ]);

         Permission::create([
            'name'          => 'Ver detalle de Gaveta',
            'slug'          => 'gavetas.show',
            'description'   => 'Ver en detalle cada estudiante del sistema',
        ]);

          //Estudiantes

          Permission::create([
            'name'          => 'Navegar Estudiantes',
            'slug'          => 'estudiantes.index',
            'description'   => 'Lista y Navega todos los estudiantes del sistema',
        ]);

        Permission::create([
            'name'          => 'Registra Estudiantes',
            'slug'          => 'estudiantes.store',
            'description'   => 'Registra una estudiante en el sistema',
        ]);

         Permission::create([
            'name'          => 'Edición de Estudiante',
            'slug'          => 'estudiantes.update',
            'description'   => 'Editar cualquier dato de una estudiante en el sistema',
        ]);

         Permission::create([
            'name'          => 'Ver detalle de Estudiante',
            'slug'          => 'estudiantes.show',
            'description'   => 'Ver en detalle cada estudiante del sistema',
        ]);

          //Expedientes

          Permission::create([
            'name'          => 'Navegar Expedientes',
            'slug'          => 'expedientes.index',
            'description'   => 'Lista y Navega todos los expedientes del sistema',
        ]);

        Permission::create([
            'name'          => 'Registra Expedientes',
            'slug'          => 'expedientes.store',
            'description'   => 'Registra una estudiante en el sistema',
        ]);

         Permission::create([
            'name'          => 'Edición de Expediente',
            'slug'          => 'expedientes.update',
            'description'   => 'Editar cualquier dato de una estudiante en el sistema',
        ]);

         Permission::create([
            'name'          => 'Ver detalle de Expediente',
            'slug'          => 'expedientes.show',
            'description'   => 'Ver en detalle cada estudiante del sistema',
        ]);
    }
}
