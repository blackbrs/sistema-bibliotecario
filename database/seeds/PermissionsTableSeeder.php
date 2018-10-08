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
        /*Permisos para poder gestionar usuarios
         Creado por Guillermo Cornejo */
        Permission::create([
            'name'          =>'Navegar Usuarios',
            'slug'          =>'users.index',
            'description'   =>'Lista que muestra a todos los usuarios del sistema'
             ]);
        
        Permission::create([
            'name'          =>'Ver los detalles de los  usuarios',
            'slug'          =>'users.show',
            'description'   =>'Ver en detalle cada uno de los usuarios del sistema'
             ]);
        
        Permission::create([
            'name'          =>'Edicion de Usuarios',
            'slug'          =>'users.edit',
            'description'   =>'Editar cualquier dato de los usuarios del sistema'
             ]);
        
        Permission::create([
            'name'          =>'Eliminar Usuario',
            'slug'          =>'users.destroy',
            'description'   =>'Eliminar cualquier usuario del sistema'
             ]);

             /*Se debatira si se crea un permiso para crear un usuario ya que el administrador
             podra crear un usuario y una persona podra crear su propio usuario pero sin los roles */

             //CONSULTAR ESTADISTICAS
             Permission::create([
                'name'          =>'Ver estadisticas de los  Usuarios',
                'slug'          =>'users.stats',
                'description'   =>'Permite ver las estadisticas de los usarios por departamento'
                 ]);

            /*Permisos para gestionar los roles de los usuarios
            Creado por Guillermo Cornejo*/
            Permission::create([
                'name'          =>'Navegar roles',
                'slug'          =>'roles.index',
                'description'   =>'Lista que muestra a todos los roles del sistema'
                 ]);

            Permission::create([
                'name'          =>'Crear roles',
                'slug'          =>'roles.create',
                'description'   =>'Permite crear roles para nuestro sistema'
                 ]);
            
            Permission::create([
                'name'          =>'Ver los detalles de los  roles',
                'slug'          =>'roles.show',
                'description'   =>'Ver en detalle cada uno de los roles del sistema'
                 ]);
            
            Permission::create([
                'name'          =>'Edicion de roles',
                'slug'          =>'roles.edit',
                'description'   =>'Editar cualquier dato de los roles del sistema'
                 ]);
            
            Permission::create([
                'name'          =>'Eliminar rol',
                'slug'          =>'roles.destroy',
                'description'   =>'Eliminar cualquier rol del sistema'
                 ]);
         /*Permisos para gestionar los libros (Recursos bibliotecarios) de los usuarios
            Creado por Guillermo Cornejo*/

            Permission::create([
                'name'          =>'Navegar Recursos bibliotecarios',
                'slug'          =>'recursobib.index',
                'description'   =>'Lista que muestra a todos los libros del sistema bibliotecario'
                 ]);

            Permission::create([
                'name'          =>'Crear Recursos bibliotecarios',
                'slug'          =>'recursobib.create',
                'description'   =>'Permite crear los libros para nuestro sistema bibliotecario'
                 ]);
            
            Permission::create([
                'name'          =>'Ver los detalles de los recursos bibliotecario',
                'slug'          =>'recursobib.show',
                'description'   =>'Ver en detalle cada uno de los libros  del sistema bibliotecario'
                 ]);
            
            Permission::create([
                'name'          =>'Edicion de Recursos bibliotecarios',
                'slug'          =>'recursobib.edit',
                'description'   =>'Editar cualquier dato de los libros del sistema bibliotecario'
                 ]);
            
            Permission::create([
                'name'          =>'Eliminar recurso bibliotecario',
                'slug'          =>'recursobib.destroy',
                'description'   =>'Eliminar cualquier recurso bibliotecario del sistema'
                 ]);


    /* Permisos para gestionar las bibliotecas del sistemas Creado por Guillermo alexander */

            Permission::create([
                'name'          =>'Navegar las bibliotecas del sistema',
                'slug'          =>'biblioteca.index',
                'description'   =>'Lista que muestra a todos las bibliotecas del sistema bibliotecario'
                ]);

            Permission::create([
                'name'          =>'Crear las bibliotecas',
                'slug'          =>'biblioteca.create',
                'description'   =>'Permite crear los libros para nuestro sistema bibliotecario'
                ]);
            
            Permission::create([
                'name'          =>'Ver los detalles de las bibliotecas del sistema',
                'slug'          =>'biblioteca.show',
                'description'   =>'Ver en detalle cada uno de los libros  del sistema bibliotecario'
                ]);
            
            Permission::create([
                'name'          =>'Editar la informacion de las bibliotecas',
                'slug'          =>'biblioteca.edit',
                'description'   =>'Editar cualquier dato de las bibliotecas sistema bibliotecario'
                ]);
            
            Permission::create([
                'name'          =>'Eliminar biblioteca',
                'slug'          =>'biblioteca.destroy',
                'description'   =>'Eliminar cualquier biblioteca del sistema'
                ]);
    }
}
