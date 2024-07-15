<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderModel
 *
 * Modelo que representa los pedidos en la base de datos.
 */
class OrderModel extends Model
{
    use HasFactory;

    /**
     * @var string La tabla asociada al modelo.
     */
    protected $table = 'orders';

    /**
     * @var array Los atributos que no son asignables en masa.
     */
    protected $guarded = [];

    /**
     * Relación de pertenencia con el modelo CustomerModel.
     *
     * Un pedido pertenece a un cliente.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /*public function customer()
    {
        return $this->belongsTo(CustomerModel::class, 'customer_id');
    }*/

    /**
     * Relación muchos a muchos con el modelo ProductModel.
     *
     * Un pedido puede tener muchos productos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(ProductModel::class);
    }

    /**
     * Relación muchos a muchos con el modelo ServiceModel.
     *
     * Un pedido puede tener muchos servicios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(ServiceModel::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
