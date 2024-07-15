<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\Rules\Role;

/**
 * Class DeliveryModel
 *
 * Este modelo representa la tabla 'delivery' en la base de datos.
 * Define las relaciones con otros modelos y usa el trait HasFactory.
 */
class DeliveryModel extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'deliveries';

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
     * Define una relación de pertenencia con el modelo VehicleModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_id');
    }
}
