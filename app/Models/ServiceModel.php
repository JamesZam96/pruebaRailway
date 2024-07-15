<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceModel
 *
 * Modelo que representa los servicios en la base de datos.
 */
class ServiceModel extends Model
{
    use HasFactory;

    /**
     * @var string La tabla asociada al modelo.
     */
    protected $table = 'services';

    /**
     * @var array Los atributos que no son asignables en masa.
     */
    protected  $guarded = [];

    /**
     * Relación muchos a muchos con el modelo OrderModel.
     *
     * Un servicio puede estar asociado con múltiples órdenes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(OrderModel::class);
    }

    public function category(){
        return $this->belongsTo(CategoryModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'service_id');
    }
}
