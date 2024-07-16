<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * Este modelo representa la tabla 'users' en la base de datos.
 * Extiende la clase Authenticatable para proporcionar funcionalidad de autenticación.
 * Define las relaciones con otros modelos y usa el trait Notifiable.
 */
class User extends Authenticatable
{
    use Notifiable, HasFactory, HasApiTokens; // Incluye HasFactory si es necesario

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Los atributos que no son asignables masivamente.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * Relación uno a muchos con el modelo DeliveryModel.
     *
     * Una persona puede realizar múltiples entregas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function delivery()
    {
        return $this->hasOne(DeliveryModel::class, 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, 'roles_users', 'user_id', 'role_id');
    }

    public function company()
    {
        return $this->hasOne(CompanyModel::class, 'user_id');
    }
    
    public function categories()
    {
        return $this->hasMany(CategoryModel::class);
    }

    public function products()
    {
        return $this->hasMany(ProductModel::class);
    }

    public function services()
    {
        return $this->hasMany(ServiceModel::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    
    public function orders(){
        return $this->hasMany(OrderModel::class);
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
}
