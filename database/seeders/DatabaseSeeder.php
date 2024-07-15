<?php
namespace Database\Seeders;

use App\Models\PermissionsModel;
use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Class RoleSeeder
 *
 * Seeder para poblar la base de datos con roles, permisos y un usuario administrador por defecto.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Este método ejecuta el seeder para crear roles, permisos y un usuario administrador.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class
        ]);
    }
}
