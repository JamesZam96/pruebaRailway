<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerModel
 *
 * Este modelo representa la tabla 'customers' en la base de datos.
 * Define las relaciones con otros modelos y usa el trait HasFactory.
 */
class CustomerModel extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * Los atributos que no son asignables masivamente.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Define una relación de pertenencia con el modelo PeopleModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define una relación uno a muchos con el modelo OrderModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(OrderModel::class, 'customer_id');
    }
}
