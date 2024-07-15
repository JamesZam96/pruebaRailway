<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleModel
 *
 * Este modelo representa la tabla 'roles' en la base de datos.
 * Utiliza el trait HasFactory para facilitar la creación de instancias del modelo.
 */
class RoleModel extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Los atributos que no son asignables masivamente.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Define una relación de muchos a muchos con el modelo User.
     * Un rol puede estar asignado a múltiples usuarios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'roles_users', 'user_id', 'role_id');
    }
}
