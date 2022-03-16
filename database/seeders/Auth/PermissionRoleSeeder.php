<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        if (app()->environment() !== 'production') {

            // Create Roles
            Role::create([
                'id' => 1,
                'type' => User::TYPE_ADMIN,
                'name' => 'Administrator',
            ]);

            // Non Grouped Permissions
            //

            // Grouped permissions
            // Users category
            $users = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user',
                'description' => 'Todos los permisos de usuario',
            ]);
            $users->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.user.list',
                    'description' => 'Ver usuarios',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.user.deactivate',
                    'description' => 'Desactivar usuarios',
                    'sort' => 2,
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.user.reactivate',
                    'description' => 'Reactivar usuarios',
                    'sort' => 3,
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.user.clear-session',
                    'description' => 'Borrar sesiones de usuario',
                    'sort' => 4,
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.user.impersonate',
                    'description' => 'Personificar usuarios',
                    'sort' => 5,
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.user.change-password',
                    'description' => 'Cambiar contraseña de usuarios',
                    'sort' => 6,
                ]),
            ]);

            $product = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.product',
                'description' => 'Todos los permisos de productos',
            ]);
            $product->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.list',
                    'description' => 'Ver productos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.create',
                    'description' => 'Crear productos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.modify',
                    'description' => 'Modificar productos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.export',
                    'description' => 'Exportar productos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.show-quantities-stock',
                    'description' => 'Ver cantidades Stock',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.show-quantities-sock-revision',
                    'description' => 'Ver cantidades Stock de Revisión Intermedia',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.show-quantities-stock-store',
                    'description' => 'Ver cantidades Stock de Tienda',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.modify-quantities',
                    'description' => 'Modificar stock de los inventarios visibles',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.show-prices',
                    'description' => 'Ver precios',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.modify-advanced-information',
                    'description' => 'Modificar informacion avanzada',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.modify-images',
                    'description' => 'Modificar imagenes',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.modify-prices-codes',
                    'description' => 'Modificar precios y codigos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.consumption',
                    'description' => 'Ver consumo',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.modify-consumption',
                    'description' => 'Modificar consumos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.delete-attributes',
                    'description' => 'Eliminar atributos (colores y tallas)',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.delete',
                    'description' => 'Borrar productos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.product.deleted',
                    'description' => 'Ver productos eliminados',
                ]),
            ]);

            $order = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.order',
                'description' => 'Todos los permisos de ordenes',
            ]);
            $order->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.order.order',
                    'description' => 'Ver ordenes',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.order.sales',
                    'description' => 'Ver ventas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.order.order-sales',
                    'description' => 'Ver ventas/ventas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.order.suborders',
                    'description' => 'Ver subordenes',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.order.create',
                    'description' => 'Crear ordenes',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.order.modify',
                    'description' => 'Modificar ordenes',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.order.export',
                    'description' => 'Exportar ordenes',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.order.delete',
                    'description' => 'Eliminar ordenes',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.order.deleted',
                    'description' => 'Ver ordenes eliminados',
                ]),
            ]);

            $material = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.material',
                'description' => 'Todos los permisos de materia prima',
            ]);
            $material->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.material.list',
                    'description' => 'Ver materia prima',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.material.show-quantities',
                    'description' => 'Ver cantidades',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.material.modify-quantities',
                    'description' => 'Modificar cantidades',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.material.show-prices',
                    'description' => 'Ver precios',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.material.create',
                    'description' => 'Crear materia prima',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.material.modify',
                    'description' => 'Modificar materia prima',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.material.export',
                    'description' => 'Exportar materia prima',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.material.delete',
                    'description' => 'Borrar materia prima',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.material.deleted',
                    'description' => 'Ver materia prima eliminada',
                ]),
            ]);

            $color = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.color',
                'description' => 'Todos los permisos de colores',
            ]);
            $color->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.color.list',
                    'description' => 'Ver colores',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.color.create',
                    'description' => 'Crear colores',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.color.modify',
                    'description' => 'Modificar colores',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.color.export',
                    'description' => 'Exportar colores',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.color.delete',
                    'description' => 'Eliminar colores',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.color.deleted',
                    'description' => 'Ver colores eliminados',
                ]),
            ]);

            $size = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.size',
                'description' => 'Todos los permisos de tallas',
            ]);
            $size->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.size.list',
                    'description' => 'Ver tallas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.size.create',
                    'description' => 'Crear tallas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.size.modify',
                    'description' => 'Modificar tallas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.size.export',
                    'description' => 'Exportar tallas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.size.delete',
                    'description' => 'Eliminar tallas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.size.deleted',
                    'description' => 'Ver tallas eliminados',
                ]),
            ]);

            $cloth = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.cloth',
                'description' => 'Todos los permisos de telas',
            ]);
            $cloth->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.cloth.list',
                    'description' => 'Ver telas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.cloth.create',
                    'description' => 'Crear telas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.cloth.modify',
                    'description' => 'Modificar telas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.cloth.export',
                    'description' => 'Exportar telas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.cloth.delete',
                    'description' => 'Eliminar telas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.cloth.deleted',
                    'description' => 'Ver telas eliminados',
                ]),
            ]);


            $line = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.line',
                'description' => 'Todos los permisos de lineas',
            ]);
            $line->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.line.list',
                    'description' => 'Ver lineas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.line.create',
                    'description' => 'Crear lineas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.line.modify',
                    'description' => 'Modificar lineas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.line.export',
                    'description' => 'Exportar lineas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.line.delete',
                    'description' => 'Eliminar lineas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.line.deleted',
                    'description' => 'Ver lineas eliminados',
                ]),
            ]);

            $unit = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.unit',
                'description' => 'Todos los permisos de unidades',
            ]);
            $unit->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.unit.list',
                    'description' => 'Ver unidades',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.unit.create',
                    'description' => 'Crear unidades',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.unit.modify',
                    'description' => 'Modificar unidades',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.unit.export',
                    'description' => 'Exportar unidades',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.unit.delete',
                    'description' => 'Eliminar unidades',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.unit.deleted',
                    'description' => 'Ver unidades eliminados',
                ]),
            ]);

            $brand = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.brand',
                'description' => 'Todos los permisos de marcas',
            ]);
            $brand->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.brand.list',
                    'description' => 'Ver marcas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.brand.create',
                    'description' => 'Crear marcas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.brand.modify',
                    'description' => 'Modificar marcas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.brand.export',
                    'description' => 'Exportar marcas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.brand.delete',
                    'description' => 'Eliminar marcas',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.brand.deleted',
                    'description' => 'Ver marcas eliminados',
                ]),
            ]);

            $document = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.document',
                'description' => 'Todos los permisos de documentos',
            ]);
            $document->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.document.list',
                    'description' => 'Ver documentos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.document.create',
                    'description' => 'Crear documento',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.document.show-dst',
                    'description' => 'Ver archivos DST',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.document.show-emb',
                    'description' => 'Ver archivos EMB',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.document.deactivate',
                    'description' => 'Desactivar documentos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.document.deleted',
                    'description' => 'Ver documentos eliminados',
                ]),
            ]);

            $departament = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.departament',
                'description' => 'Todos los permisos de departamentos',
            ]);
            $departament->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.departament.list',
                    'description' => 'Ver departamentos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.departament.create',
                    'description' => 'Crear departamentos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.departament.modify',
                    'description' => 'Modificar departamentos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.departament.delete',
                    'description' => 'Eliminar departamento',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.departament.deleted',
                    'description' => 'Ver departamentos eliminados',
                ]),
            ]);

            $service = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.service',
                'description' => 'Todos los permisos de servicios',
            ]);
            $service->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.service.list',
                    'description' => 'Ver servicios',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.service.create',
                    'description' => 'Crear servicios',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.service.modify',
                    'description' => 'Modificar servicios',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.service.delete',
                    'description' => 'Eliminar servicios',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.service.deleted',
                    'description' => 'Ver servicios eliminados',
                ]),
            ]);

            $model_product = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.model_product',
                'description' => 'Todos los permisos de modelos de productos',
            ]);
            $model_product->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.model_product.list',
                    'description' => 'Ver modelos de productos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.model_product.create',
                    'description' => 'Crear modelos de productos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.model_product.modify',
                    'description' => 'Modificar modelos de productos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.model_product.delete',
                    'description' => 'Eliminar modelos de productos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.model_product.deleted',
                    'description' => 'Ver modelos de productos eliminados',
                ]),
            ]);

            $store = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.store',
                'description' => 'Todos los permisos de la tienda',
            ]);
            $store->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.store.list',
                    'description' => 'Ver panel de tienda',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.store.list_finance',
                    'description' => 'Ver panel de ingresos y egresos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.store.create_finance',
                    'description' => 'Crear ingresos o egresos',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.store.create_box',
                    'description' => 'Crear cortes de caja',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.store.list_box',
                    'description' => 'Ver cortes de caja',
                ]),
            ]);


            $states_production = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.states_production',
                'description' => 'Todos los permisos de estados de producción',
            ]);
            $states_production->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.states_production.list',
                    'description' => 'Ver estados de producción',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.states_production.create',
                    'description' => 'Crear estados de producción',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.states_production.modify',
                    'description' => 'Modificar estados de producción',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.states_production.delete',
                    'description' => 'Eliminar estados de producción',
                ]),
            ]);


            $settings = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.settings',
                'description' => 'Todos los permisos configuraciones',
            ]);
            $settings->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.settings.list',
                    'description' => 'Ver configuraciones generales',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.settings.modify',
                    'description' => 'Modificar configuraciones generales',
                ]),
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.settings.list_pages',
                    'description' => 'Ver, modificar y eliminar páginas',
                ]),
            ]);

            $cart = Permission::create([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.cart',
                'description' => 'Todos los permisos carrito de compras',
            ]);
            $cart->children()->saveMany([
                new Permission([
                    'type' => User::TYPE_ADMIN,
                    'name' => 'admin.access.cart.list',
                    'description' => 'Ver carrito de compras',
                ]),
            ]);
        }

        // Assign Permissions to other Roles
        //

        $this->enableForeignKeys();
    }
}
